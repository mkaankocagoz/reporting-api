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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->char('number', 25);
            $table->char('expiryMonth', 2);
            $table->char('expiryYear', 4);
            $table->char('startMonth', 2)->nullable();
            $table->char('startYear', 2)->nullable();
            $table->integer('issueNumber')->nullable();
            $table->char('email', 30);
            $table->dateTime('birthday');
            $table->char('gender', 5)->nullable();
            $table->char('billingTitle', 25)->nullable();
            $table->char('billingFirstName', 25);
            $table->char('billingLastName', 25);
            $table->char('billingCompany', 25)->nullable();
            $table->string('billingAddress1');
            $table->char('billingAddress2', 25)->nullable();
            $table->char('billingCity', 25);
            $table->char('billingPostcode', 25);
            $table->char('billingState', 25)->nullable();
            $table->char('billingCountry', 5);
            $table->char('billingPhone', 25)->nullable();
            $table->char('billingFax', 25)->nullable();
            $table->char('shippingTitle', 25)->nullable();
            $table->char('shippingFirstName', 25);
            $table->char('shippingLastName', 25);
            $table->char('shippingCompany', 25)->nullable();
            $table->char('shippingAddress1', 25);
            $table->char('shippingAddress2', 25)->nullable();
            $table->char('shippingCity', 25);
            $table->char('shippingPostcode', 25);
            $table->char('shippingState', 25)->nullable();
            $table->char('shippingCountry', 5);
            $table->char('shippingPhone', 25)->nullable();
            $table->char('shippingFax', 25)->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
