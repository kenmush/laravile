<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_history_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id')->nullable();

            $table->string('transaction_id', 64)->nullable();
            $table->string('charge', 32)->nullable();
            $table->string('amount', 32)->nullable();
            $table->string('amount_refunded', 32)->nullable();

            $table->string('application', 64)->nullable();
            $table->string('application_fee', 32)->nullable();
            $table->string('application_fee_amount', 32)->nullable();
            $table->string('balance_transaction', 32)->nullable();

            $table->string('captured', 32)->nullable();
            $table->string('created', 32)->nullable();
            $table->string('currency', 32)->nullable();
            $table->string('customer', 225)->nullable();

            $table->string('description', 255)->nullable();
            $table->string('destination', 128)->nullable();

            $table->string('despute', 225)->nullable();
            $table->string('failure_code', 64)->nullable();
            $table->string('failure_message', 225)->nullable();

            $table->string('paid', 64)->nullable();
            $table->string('payment_intent', 225)->nullable();
            $table->string('payment_method', 225)->nullable();

            $table->string('receipt_email', 128)->nullable();
            $table->string('receipt_number', 64)->nullable();
            $table->string('receipt_url', 225)->nullable();
            $table->string('refunded', 225)->nullable();

            $table->string('status', 128)->nullable();
            $table->longText('raw_data')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_history_logs');
    }
}
