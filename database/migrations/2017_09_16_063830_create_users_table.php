<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('gender')->default(0);
            $table->string('email', 60)->unique();
            $table->string('password', 60);
            $table->integer('phone');
            $table->boolean('status');
            $table->dateTime('last_login');
            $table->rememberToken();
            $table->string('confirmation_code');
            $table->integer('number_sponsorship');
            $table->integer('commission_id')->unsigned();
            $table->integer('id_renumeration')->unsigned();
            $table->integer('categoriPrestation_id')->unsigned();
            $table->boolean('is_registered')->default(false);
            $table->boolean('is_parent')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('users', function ($table) {
            $table->foreign('commission_id')->references('id')->on('commissions')->onUpdate('cascade');
            $table->foreign('id_renumeration')->references('id')->on('renumerations')->onUpdate('cascade');
            $table->foreign('categoriPrestation_id')->references('id')->on('categorie_prestation')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
