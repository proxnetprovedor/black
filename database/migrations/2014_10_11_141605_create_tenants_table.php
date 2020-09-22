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
            $table->string('cnpj', 100)->unique();
            $table->string('name', 200)->unique();
            $table->string('email', 200)->unique();
            $table->string('url', 200)->unique();
            $table->string('logo', 200)->nullable();
            $table->uuid('plan_id'); // plano de acesso da provedora

            // se for false perde acesso 
            $table->boolean('active')->nullable()->default(true);

            // subscription
            $table->date('subscription_date')->format('d-m-Y')->nullable(); // data que se inscreveu
            $table->date('expires_at')->format('d-m-Y')->nullable(); // data que expira o acesso
            $table->string('subscription_id', 255)->nullable();// identificando o gateway de pagamento
            $table->boolean('subscription_active')->nullable()->default(false); // assinatura ativa ?
            $table->boolean('subscription_suspende')->nullable()->default(false); // assinatura cancelada ?

            // localização do tenant, talkei
            $table->string('lat', 200)->nullable();
            $table->string('lng', 200)->nullable();

            $table->softDeletes();
            $table->timestamps();

            // $table->uuid('created_by');
            // $table->uuid('updated_by')->nullable();
            // $table->uuid('deleted_by')->nullable();

            $table->foreign('plan_id')->references('id')->on('acl_plans.plans');
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
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

