<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('trx_callbacks')) {
            Schema::create('trx_callbacks', function (Blueprint $table) {
                $table->id();
                $table->string('callback_id')->nullable();
                $table->string('payment_gateway')->nullable();
                $table->string('payment_amount')->nullable();
                $table->string('partner_reference_no')->nullable();
                $table->string('original_reference_no')->nullable();
                $table->string('status')->nullable();
                $table->date('date_create')->nullable();
                $table->longText('request_body')->nullable();
                $table->timestamps();
                $table->boolean('is_send_merchant')->default(false);
                $table->string('payment_method')->nullable();
                $table->index(['payment_gateway', 'payment_method'], 'trx_callbacks_pg_method_IDX');
                $table->index('payment_gateway', 'trx_callbacks_payment_gateway_IDX');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_callbacks');
    }
};
