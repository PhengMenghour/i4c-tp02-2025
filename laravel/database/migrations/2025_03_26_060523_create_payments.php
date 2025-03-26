<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('payment_date')->useCurrent();
            $table->string('payment_method', 100);
            $table->decimal('amount', 10, 2);
            $table->BigInteger('order_id')->unsigned();
            $table->BigInteger('customer_id')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};