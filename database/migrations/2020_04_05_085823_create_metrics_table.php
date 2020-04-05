<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();
            $table->string('screenshot');
            $table->string('site_title');
            $table->integer('monthly_visit')->nullable();
            $table->integer('coverage_views')->nullable();
            $table->string('domain_authority')->nullable();
            $table->string('shared_on_fb')->nullable();
            $table->string('shared_on_twitter')->nullable();
            $table->string('shared_on_pinterest')->nullable();
            $table->string('full_screen_shot')->nullable();
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
        Schema::dropIfExists('metrics');
    }
}
