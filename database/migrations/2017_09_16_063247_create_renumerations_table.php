<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenumerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renumerations', function (Blueprint $table) {
          $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('commissions_id')->unsigned();
            $table->foreign('commissions_id')->references('id')->on('commissions')->onUpdate('restrict');
            $table->boolean('etat_renumeration')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renumerations');
    }
}
