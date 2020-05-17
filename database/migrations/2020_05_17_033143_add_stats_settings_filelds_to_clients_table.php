<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatsSettingsFileldsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('coverage_reports')->default(1)->after('domain');
            $table->boolean('press_pieces')->default(1)->after('domain');
            $table->boolean('alerts')->default(1)->after('domain');
            $table->boolean('social_shares')->default(1)->after('domain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('coverage_reports');
            $table->dropColumn('press_pieces');
            $table->dropColumn('alerts');
            $table->dropColumn('social_shares');
        });
    }
}
