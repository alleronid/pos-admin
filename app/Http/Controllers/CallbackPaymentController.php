<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Enums\AyolinkEnums;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
 use App\Models\TrxCallback;
 use App\Models\Sale;
 use Exception;

class CallbackPaymentController extends Controller
{
    private const PAYMENT_GATEWAY = 'AYOLINK';

    public function ayo_callback(Request $request)
    {
        $bodyRaw = file_get_contents('php://input');
        
        try {
            $body = json_decode($bodyRaw, false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {
            Log::error('AyolinkPaymentCallback: Invalid JSON in callback', [
                'body' => $bodyRaw,
                'error' => $e->getMessage(),
                'url' => url()->current()
            ]);

            return response()->json([
                'responseCode' => AyolinkEnums::SUCCESS_CALLBACK,
                'responseMessage' => 'Successful',
            ]);
        }

         $referencenNo = $request->query('paymentNo')
            ?? $request->query('refNo')
            ?? $body->originalPartnerReferenceNo
            ?? null;

        if (! $referencenNo) {
            Log::error('AyolinkPaymentCallback: Transaction ID not found in callback', [
                'body' => $bodyRaw,
                'url' => url()->current()
            ]);

            return response()->json([
                'responseCode' => AyolinkEnums::SUCCESS_CALLBACK,
                'responseMessage' => 'Successful',
            ]);
        }


        Log::info('AyolinkPaymentCallback: Ayolinx callback request started', [
            'route'          => $request->path(),
            'payload'        => $request->all(),
            'reference_no'   => $referencenNo,
            'url'            => url()->current()
        ]);

        $sales = Sale::where('reference_no', $referencenNo)
                    ->where('payment_status', '1')
                    ->lockForUpdate()
                    ->first();

        if (! isset($body->latestTransactionStatus)) {
            Log::error('AyolinkPaymentCallback: Missing latestTransactionStatus in callback', [
                'reference_no' => $referencenNo,
                'url'          => url()->current()
            ]);

            return response()->json([
                'responseCode'    => AyolinkEnums::SUCCESS_CALLBACK,
                'responseMessage' => 'Successful',
            ]);
        }

        $paymentMethod  = '';
        $statusCallback = '';

        if (isset($body->latestTransactionStatus)) {
            $isQRIS = ! isset($body->additionalInfo->channel) ||
                      ! isset($body->amount->value) ||
                      ! isset($body->finishedTime);

            if ($isQRIS) {
                    $paymentMethod = 'QRIS';
            }else{
                    $paymentMethod = 'UNKNOWN';
            }

            switch ($body->latestTransactionStatus) {
                case '00':
                    $statusCallback = 'SUCCESS';
                    break;
                case '01':
                    $statusCallback = 'INITIATED';
                    break;
                case '02':
                    $statusCallback = 'PAYING';
                    break;
                case '03':
                    $statusCallback = 'PENDING';
                    break;
                case '04':
                    $statusCallback = 'REFUNDED';
                    break;
                case '05':
                    $statusCallback = 'CANCELED';
                    break;
                case '06':
                    $statusCallback = 'FAILED';
                    break;
                case '07':
                    $statusCallback = 'NOT_FOUND';
                    break;
                default:
                    $statusCallback = 'UNKNOWN';
                    break;
            }
        }
        
        try {
            DB::beginTransaction();
            $amount       = $body->amount->value ?? 0;
            $milliseconds = (int)(microtime(true) * 1000);

            // Create callback record
            $callback                         = new TrxCallback;
            $callback->callback_id            = 'CB' . date('Ymd') . $milliseconds . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $callback->payment_method         = $sales->payment_method;
            $callback->payment_gateway        = self::PAYMENT_GATEWAY;
            $callback->payment_amount         = $amount;
            $callback->partner_reference_no   = $body->originalPartnerReferenceNo ?? null;
            $callback->original_reference_no  = $body->originalReferenceNo ?? null;
            
            $callback->status = $statusCallback === 'SUCCESS' ? 'PAID' :
                ($statusCallback === 'INITIATED' ? 'UNPAID' :
                ($statusCallback === 'CANCELED' ? 'CANCEL' : 'EXPIRED'));

            $callback->date_create          = Carbon::now();
            $callback->request_body         = $bodyRaw;
            $callback->save();

            $sales->payment_status = match ($statusCallback) {
                'SUCCESS'   => 3,
                'INITIATED' => 1,
                'CANCELED'  => 2,
                default     => 2,
            };
        
            $sales->updated_at = Carbon::now();
            $sales->save();
            
            DB::commit();
          
            Log::info('AyolinkPaymentCallback: Ayolinx callback request processed', [
                'route'           => $request->path(),
                'payload'         => $request->all(),
                'sale'            => $sales->id,
                'status'          => $statusCallback,
                'payment_method'  => $paymentMethod,
                'url'             => url()->current()
            ]);

            Log::info('AyolinkPaymentCallback: Ayolinx callback response sent', [
                'responseCode'      => AyolinkEnums::SUCCESS_CALLBACK,
                'responseMessage'   => 'Successful',
                'url'               => url()->current()
            ]);

            return response()->json([
                'responseCode'    => AyolinkEnums::SUCCESS_CALLBACK,
                'responseMessage' => 'Successful',
            ]);

        }catch (Exception $e) {
            DB::rollBack();
            Log::error('AyolinkPaymentCallback: Processing error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'reference_no' => $referencenNo ?? null,
            ]);
            return response()->json([
                'responseCode'    => AyolinkEnums::SUCCESS_CALLBACK,
                'responseMessage' => 'Successful',
            ]);
        }
    }
}