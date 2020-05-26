<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription.costumers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 200)->nullable();
            $table->string('phone', 11)->nullable()->default('95999999999');
            $table->string('email', 100);
            $table->date('birth')->format('d-m-Y')->nullable();
            $table->string('lat', 200)->nullable();
            $table->string('lng', 200)->nullable();
            $table->enum('civil_state', ['casado', 'solteiro', 'viuvo', 'união estavel'])->nullable();
            $table->string('description', 200)->nullable()->default('text');
            $table->smallInteger('pay_day')->nullable()->default(05);

            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->uuid('tenant_id')->nullable();
            $table->uuid('person_id')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('providers.tenants')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
            
            
        });
        DB::statement('ALTER TABLE subscription.costumers ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription.costumers');
    }
}
