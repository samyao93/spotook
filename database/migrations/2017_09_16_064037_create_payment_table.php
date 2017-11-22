<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('provider',50);
            $table->string('name');
            $table->string('provider_url');
            $table->dateTime('payment_date');
            $table->boolean('is_on_site');
            $table->boolean('can_refund')->default(false);
            $table->boolean('payment_state')->default(false);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
