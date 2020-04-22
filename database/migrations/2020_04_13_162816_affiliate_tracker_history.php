<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AffiliateTrackerHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_tracker_history', function (Blueprint $table) {
            $table->id();
            $table->integer('token');
            $table->string('affiliate_url');
            $table->string('ip_address')->nullable();
            $table->string('browser')->nullable();
            $table->string('device')->nullable();
            $table->string('operating_system')->nullable();
            $table->integer('has_register')->default('0')->comment('0 No, 1 Yes');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('affiliate_tracker_history');
    }
}
