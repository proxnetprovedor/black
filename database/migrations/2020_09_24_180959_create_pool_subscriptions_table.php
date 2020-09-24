<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers.pool_subscriptions', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('pool_id');
            $table->uuid('subscription_id');
            $table->foreign('pool_id')->references('id')->on('providers.pools')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('providers.subscriptions')->onDelete('cascade');
            $table->primary(['pool_id', 'subscription_id']);

            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->uuid('tenant_id')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('providers.tenants')->onDelete('cascade');
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
        Schema::dropIfExists('providers.pool_subscriptions');
    }
}
