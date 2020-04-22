<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PromotorUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotor_user', function (Blueprint $table) {
            $table->integer('promotor_id');
            $table->string('affiliate_url');
            $table->string('payment_id');
            $table->integer('user_id');
            $table->integer('has_refund')->default('0')->comment('0 No, 1 Yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotor_user');
    }
}
