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
        Schema::create('callbacks', function (Blueprint $table) {
            $table->id();
            $table->string('original_partner_no');
            $table->string('partner_no');
            $table->string('amount');
            $table->string('fee');
            $table->sting('product_code', 30);
            $table->string('nonce_str');
            $table->string('status');
            $table->string('payed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('callbacks');
    }
};
