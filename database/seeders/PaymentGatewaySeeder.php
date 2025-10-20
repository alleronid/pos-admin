<?php

namespace Database\Seeders;

use App\Models\PaymentGateway;
use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentGateway::truncate();
        $paymentMethods = [
            [
                'title'             => 'Stripe',
                'name'              => 'stripe',
                'config'            => json_encode([
                    'secret_key'    => 'sk_test_51LQPRBI8v6B8L0HsH8JBOEoUuzy0OMkhiOeqfiei1AHEkZBUnmcf7Cv5Go6fwhi3HYayZgjeLxjDsP0DYHcR0xJ1008GRte5Vf',
                    'published_key' => 'pk_test_51LQPRBI8v6B8L0HsDPqZN4PY9gpuOvAktw3bqhvqWfo3zXs7Xe6S1hntVX7hZjVIVCDQ76nroy0nHUYGpRjt0lbT00aiqqq3M7',
                ]),
                'mode'              => 'test',
                'alias'             => 'stripe',
                'is_active'         => true,
            ],
            [
                'title'             => 'PayPal',
                'name'              => 'paypal',
                'config'            => json_encode([
                    'client_id'     => 'AfQ5QcPh5sYCjLfMIghVO_rwBAVyG1GjCiTpAb4aNxS5rgoRu7L9TLrQYqm8z1zszb5sXL_0NW5-T658',
                    'client_secret' => 'EGDDuVCIfx6MwC-NL64Lj4Fh43_cdUAHuqj0vo3ezi_kVe3qvGDeTX--DtrCrHI2owu0QUQAKFLoxWk-',
                ]),
                'mode'              => 'test',
                'alias'             => 'paypal',
                'is_active'         => true,
            ],
            [
                'title'             => 'Razorpay',
                'name'              => 'razorpay',
                'config'            => json_encode([
                    'key'           => 'rzp_test_k23Mr4BskGqpBu',
                    'secret'        => 'LTrXh7U5xWeZoAHcqdhemFkg',
                ]),
                'mode'              => 'test',
                'alias'             => 'razorpay',
                'is_active'         => true,
            ],
            [
                'title'             => 'Paystack',
                'name'              => 'paystack',
                'config'            => json_encode([
                    'public_key'    => 'pk_test_0c871ddaa80aafd5b64f14390e0745a6c3c274bc',
                    'secret_key'    => 'sk_test_03c7e6762cf1772676272d4677e21e60323610aa',
                    'machant_email' => '',
                ]),
                'mode'              => 'test',
                'alias'             => 'paystack',
                'is_active'         => true,
            ],

            [
                'title'             => 'OrangePay',
                'name'              => 'orangepay',
                'config'            => json_encode([
                    'client_id'     => '4d2ceeaa-8ceb-4841-a3a9-4f8a05702092',
                    'client_secret' => 'bd912517-9db0-4770-9806-61b28414f369',
                    'merchant_code' => 'bd912517-9db0-4770-9806',
                ]),
                'mode'              => 'test',
                'alias'             => 'orangepay',
                'is_active'         => true,
            ],

            [
                'title'             => 'PayFast',
                'name'              => 'payfast',
                'config'            => json_encode([
                    'merchant_id'   => '10036184',
                    'merchant_key'  => 'iz2owp36ngf2n',
                ]),
                'mode'              => 'test',
                'alias'             => 'payfast',
                'is_active'         => true,
            ],
        ];

        PaymentGateway::insert($paymentMethods);
    }
}
