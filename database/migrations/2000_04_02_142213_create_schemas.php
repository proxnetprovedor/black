<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemas extends Migration
{

    public function up()
    {
        DB::unprepared('CREATE SCHEMA acl_plans');
        DB::unprepared('CREATE SCHEMA subscription');
        DB::unprepared('CREATE SCHEMA providers');
        // DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
    }

    public function down()
    {
        DB::unprepared('DROP SCHEMA acl_plans CASCADE');
        DB::unprepared('DROP SCHEMA subscription CASCADE');
        DB::unprepared('DROP SCHEMA providers CASCADE');
        // DB::statement('DROP EXTENSION IF EXISTS "uuid-ossp";');
    }
}
