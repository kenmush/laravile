<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('report_id');
            $table->string('title');
            $table->string('slug');
            $table->string('cover')->nullable();
            $table->longText('html')->nullable();
            $table->longText('css')->nullable();
            $table->string('template')->nullable();
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
        Schema::dropIfExists('custom_reports');
    }
}
