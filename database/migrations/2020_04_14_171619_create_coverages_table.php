<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coverages', function (Blueprint $table) {
            $table->id();
            $table->uuid('report_id');
            $table->string('url');
            $table->string('title');
            $table->date('report_date');
            $table->integer('monthly_visit')->nullable();
            $table->integer('coverage_view')->nullable();
            $table->integer('domain_authority')->nullable();
            $table->string('screen_shot_featured')->nullable();
            $table->string('screen_shot_full_screen')->nullable();
            $table->integer('facebook_share')->nullable();
            $table->integer('twitter_share')->nullable();
            $table->integer('pinterest_share')->nullable();
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
        Schema::dropIfExists('coverages');
    }
}
