<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('merchantId');
            $table->integer('acquirerId');
            $table->integer('customerId');
            $table->char('currency', 4);
            $table->double('amount', 8, 2);
            $table->char('status', 10);
            $table->char('operation', 10);
            $table->char('referenceNo', 20);
            $table->string('message');
            $table->uuid('transactionId');
            $table->boolean('refundable');
            $table->char('channel', 10);
            $table->string('customData')->nullable();
            $table->integer('agentInfoId');
            $table->integer('fxTransactionId');
            $table->integer('acquirerTransactionId');
            $table->char('paymentMethod', 25);
            $table->char('code', 5);
            $table->char('errorCode', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
