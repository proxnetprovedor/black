<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternetPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers.internet_plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->double('price', 8, 2)->nullable()->default(100.00);
            $table->double('download_rate', 5, 2)->nullable()->default(100.00);
            $table->double('upload_rate', 5, 2)->nullable()->default(100.00);
            $table->boolean('is_ppoe')->nullable();
            $table->boolean('is_hotpost')->nullable();

            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->uuid('tenant_id')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('providers.tenants')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
        // DB::statement('ALTER TABLE providers.internet_plans ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers.internet_plans');
    }
}
