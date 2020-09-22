<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription.subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('auto_block')->nullable()->default(false);
            
            $table->date('pay_day')->format('d-m-Y')->nullable();
            $table->double('pay_discount', 3, 2)->nullable()->default(5.0);
            $table->double('pay_exta', 3, 2)->nullable()->default(5.0);
            $table->boolean('has_to_pay')->nullable()->default(false);
            $table->smallInteger('days_to_block')->nullable()->default(12);
            $table->string('auth_type', 100)->nullable()->default('ppoe');
            $table->string('login', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('ip_address', 100)->nullable()->default('127.0.0.1');
            $table->string('mac_address', 100)->nullable()->default('127.0.0.1');
            
            $table->uuid('contract_id')->nullable();
            $table->uuid('instalation_id')->nullable();
            $table->uuid('server_id')->nullable();
            $table->uuid('costumer_id')->nullable();
            $table->uuid('employee_id')->nullable();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->uuid('tenant_id')->nullable();
            $table->uuid('internet_plan_id')->nullable();
            
            
            $table->uuid('address_charge_id')->nullable();

            $table->foreign('contract_id')->references('id')->on('subscription.contracts')->onDelete('cascade');
            $table->foreign('instalation_id')->references('id')->on('providers.instalations')->onDelete('cascade');
            $table->foreign('internet_plan_id')->references('id')->on('providers.internet_plans')->onDelete('cascade');
            
            $table->foreign('server_id')->references('id')->on('providers.servers')->onDelete('cascade');
            $table->foreign('costumer_id')->references('id')->on('subscription.costumers')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('providers.employees')->onDelete('cascade');
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('providers.tenants')->onDelete('cascade');

            $table->timestamps();
        });
        // DB::statement('ALTER TABLE subscription.subscriptions ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription.subscriptions');
    }
}
