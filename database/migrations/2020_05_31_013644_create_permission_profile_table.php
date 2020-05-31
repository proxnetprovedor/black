<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acl_plans.permission_profile', function (Blueprint $table) {
            $table->uuid('profile_id');
            $table->uuid('permission_id');

            $table->foreign('profile_id')
                ->references('id')
                ->on('acl_plans.profiles')
                ->onDelete('cascade');

            $table->foreign('permission_id')
                ->references('id')
                ->on('acl_plans.permissions')
                ->onDelete('cascade');

            $table->primary(['profile_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_profile');
    }
}
