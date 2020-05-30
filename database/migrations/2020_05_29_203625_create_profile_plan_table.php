<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acl_plans.profile_plan', function (Blueprint $table) {
            $table->uuid('profile_id');
            $table->uuid('plan_id');

            $table->foreign('profile_id')
                ->references('id')
                ->on('acl_plans.profiles')
                ->onDelete('cascade');

            $table->foreign('plan_id')
                ->references('id')
                ->on('acl_plans.plans')
                ->onDelete('cascade');

            $table->primary(['profile_id', 'plan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acl_plans.profile_plan');
    }
}
