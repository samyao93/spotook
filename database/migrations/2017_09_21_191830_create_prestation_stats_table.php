<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestationStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestation_stats', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('prestations_id')->unsigned();
            $table->date('date');
            $table->integer('vues');
            $table->integer('vue_uniques');
            $table->integer('nbre_prestations_vendues');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('prestation_stats', function ($table) {
            $table->foreign('prestations_id')->references('id')->on('prestations')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestation_stats');
    }
}
