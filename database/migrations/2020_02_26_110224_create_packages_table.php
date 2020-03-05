<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pkg_name');
            $table->string('img');
            $table->string('per_price');
            $table->string('day');
            $table->string('min_num');
            $table->string('max_num');
            $table->string('booking_date');
            $table->string('till_date');
            $table->string('leaving_form');
            $table->string('leaving_to');
            $table->text('overview');
            $table->text('schedule');
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
        Schema::dropIfExists('packages');
    }
}
