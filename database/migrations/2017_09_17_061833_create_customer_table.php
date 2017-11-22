<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('numero_client',20)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('gender')->default(0);
            $table->string('email', 50)->unique();
            $table->string('adresse_postal', 50);
            $table->string('last_login')->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('customer', function ($table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('employee')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
