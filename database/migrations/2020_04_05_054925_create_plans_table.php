<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->nullable();
            $table->integer('books')->nullable()->comment("here null means unlimited");
            $table->integer('clients')->nullable()->comment("here null means unlimited");;
            $table->integer('users')->nullable()->comment("here null means unlimited");;
            $table->integer('report')->nullable()->comment("here null means unlimited");;
            $table->integer('validity')->nullable()->comment("in days");;
            $table->float('price')->nullable();
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
        Schema::dropIfExists('plans');
    }
}
