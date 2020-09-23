<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServerIdToInternetPlanServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers.internet_plan_servers', function (Blueprint $table) {
            $table->uuid('server_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers.internet_plan_servers', function (Blueprint $table) {
            $table->dropColumn('server_id');
        });
    }
}
