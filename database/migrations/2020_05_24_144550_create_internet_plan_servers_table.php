<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternetPlanServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers.internet_plan_servers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('server_id');
            $table->uuid('internet_plan_id');
            $table->foreign('server_id')->references('id')->on('providers.servers')->onDelete('cascade');
            $table->foreign('internet_plan_id')->references('id')->on('providers.tenants')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE providers.internet_plan_servers ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers.internet_plan_servers');
    }
}
