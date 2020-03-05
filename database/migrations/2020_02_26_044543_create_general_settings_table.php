<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',20)->nullable();
            $table->string('logo_name',20)->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('color',15)->nullable();
            $table->string('navbar_color',15)->nullable();
            $table->string('address')->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('email')->nullable();
            $table->string('currency',3)->nullable();
            $table->text('top_text')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tweeter')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('linkin')->nullable();
            $table->string('youtube')->nullable();
            $table->text('footer_text')->nullable();
            $table->text('fotr_btm_txt')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
