<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('lat', 200)->nullable();
            $table->string('lng', 200)->nullable();

            $table->string('cep', 11);
            $table->string('neighborthood', 200);
            $table->string('address', 200);
            $table->string('number', 10);
            $table->string('state', 200);
            $table->string('city', 200)->nullable();
            $table->string('complement', 200)->nullable();
            $table->string('condominium', 200)->nullable();
            $table->string('block', 200)->nullable();
            $table->string('apartment', 200)->nullable();
            $table->uuidMorphs('addressable');

            $table->uuid('created_by')->nullable();
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
        // DB::statement('ALTER TABLE addresses ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
