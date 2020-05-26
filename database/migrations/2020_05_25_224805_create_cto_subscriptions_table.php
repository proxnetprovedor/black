<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtoSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers.cto_subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cto_id');
            $table->uuid('subscription_id');
            $table->string('spliter', 100);

            $table->foreign('subscription_id')->references('id')->on('subscription.subscriptions')->onDelete('cascade');
            $table->foreign('cto_id')->references('id')->on('providers.ctos')->onDelete('cascade');

            $table->timestamps();
        });
        DB::statement('ALTER TABLE providers.cto_subscriptions ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers.cto_subscriptions');
    }
}
