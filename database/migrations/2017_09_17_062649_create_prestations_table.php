<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestations', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('categoriePrestation_id')->unsigned();
            $table->integer('business_id')->unsigned();
            $table->string('name');
            $table->time('duration');
            $table->decimal('price');
            $table->string('designation');
            $table->timestamps();
            $table->softDeletes();
        });

         Schema::table('prestations', function ($table) {
           $table->foreign('categoriePrestation_id')->references('id')->on('categorie_prestation')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('business_id')->references('id')->on('business')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestations');
    }
}
