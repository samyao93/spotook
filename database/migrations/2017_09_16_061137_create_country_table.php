<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
         public function up()
    {
        
        Schema::create('country', function ($table) {
            $table->integer('id')->unsigned();
            $table->string('full_name', 255)->nullable();
            $table->string('capital', 255)->nullable();
            $table->string('country_code', 3)->default('');
            $table->string('currency', 255)->nullable();
            $table->string('iso_3166_2', 2)->default('');
            $table->string('name', 255)->default('');
            $table->boolean('eea')->default(0);

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('country');
    }
}
