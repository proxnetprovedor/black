<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers.tenants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 200);
            $table->string('cnpj', 100)->nullable();
            $table->string('url', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('logo', 200)->nullable();
            $table->boolean('active')->nullable()->default(true);
            $table->date('subscription_date')->format('d-m-Y')->nullable();
            $table->date('expires_at')->format('d-m-Y')->nullable();
            $table->boolean('subscription_active')->nullable()->default(true);
            $table->boolean('subscription_suspende')->nullable()->default(true);
            $table->string('lat', 200)->nullable();
            $table->string('lng', 200)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });
        // DB::statement('ALTER TABLE providers.tenants ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers.tenants');
    }
}

