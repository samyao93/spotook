<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id', 20);
            $table->integer('users_id')->unsigned();
            $table->integer('prestation_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('reservation_status_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->integer('workingTime_id')->unsigned();
            $table->dateTime('date');
            $table->decimal('montant');
            $table->decimal('total');
            $table->timestamps();
        });

        Schema::table('reservation', function ($table) {
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('prestation_id')->references('id')->on('prestations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reservation_status_id')->references('id')->on('reservation_status')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_id')->references('id')->on('payment')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('workingTime_id')->references('id')->on('employee_working_time')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
