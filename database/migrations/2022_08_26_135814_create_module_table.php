<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Module', function (Blueprint $table) {
            $table->id();
            $table->string("bezeichnung");
            $table->foreignId("raum");
            $table->foreignId("professor");
            $table->foreignId("studiengang");
            $table->dateTime("uhrzeit");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Module');
    }
}
