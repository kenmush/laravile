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
            $table->unsignedInteger('report_id');
            $table->string('url');
            $table->string('title');
            $table->date('report_date');
            $table->integer('monthly_visit');
            $table->integer('coverage_view');
            $table->integer('domain_authority');
            $table->string('screen_shot_featured');
            $table->string('screen_shot_full_screen');
            $table->integer('facebook_share');
            $table->integer('twitter_share');
            $table->integer('pinterest_share');
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
