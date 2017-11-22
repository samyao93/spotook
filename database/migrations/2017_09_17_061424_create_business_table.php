<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('id_categoriePrestation')->unsigned();
            $table->integer('id_businessImage')->unsigned();
            $table->integer('id_country')->unsigned();
            $table->string('name',60)->unique();
            $table->text('description');
            $table->string('adresse_postal');
            $table->string('confirmation_keys');
            $table->string('facebook_page');
            $table->string('logo_path');
            $table->boolean('activation_page');
            $table->string('google_analytics');
            $table->timestamps();
        });

         Schema::table('business', function ($table) {
             $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('id_categoriePrestation')->references('id')->on('categorie_prestation')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('id_businessImage')->references('id')->on('business_image')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('id_country')->references('id')->on('country')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business');
    }
}
