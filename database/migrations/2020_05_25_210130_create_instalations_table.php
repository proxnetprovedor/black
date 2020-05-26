<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers.instalations', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('ssid', 200)->nullable();
            $table->string('password', 100)->nullable()->default('password');
            $table->string('radio_ip', 100)->nullable()->default('127.0.0.1');
            $table->string('onu_olt_model', 100)->nullable();
            $table->string('onu_serial', 100)->nullable();
            $table->string('onu_ip', 100)->nullable();
            $table->string('onu_mac', 100)->nullable();
            $table->string('caixa_switch', 100)->nullable();
            $table->string('switch_porta', 100)->nullable();
            $table->string('pppoe_port', 100)->nullable();

            //$table->uuid('vlan_id')->nullable();
            
            $table->uuid('access_point_id')->nullable();
            $table->uuid('instalation_type_id')->nullable();
            $table->uuid('cto_id')->nullable();

            $table->foreign('access_point_id')->references('id')->on('providers.acces_points')->onDelete('cascade');
            $table->foreign('instalation_type_id')->references('id')->on('providers.instalation_types')->onDelete('cascade');
            $table->foreign('cto_id')->references('id')->on('providers.ctos')->onDelete('cascade');
            
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->uuid('tenant_id')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('providers.tenants')->onDelete('cascade');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE providers.instalations ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers.instalations');
    }
}
