<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('tradename');
            $table->text('address');
            $table->string('phone');
            $table->string('taxRegime')->nullable();
            $table->string('mainActivity')->nullable();
            $table->string('legalRegistration')->nullable();
            $table->string('legalNature')->nullable();
            $table->string('taxRegistration')->nullable();
            $table->string('representativeDocument')->nullable();
            $table->string('commercialRegister')->nullable();

           $table->bigInteger('talents_id')->unsigned();
           $table->foreign('talents_id')->references('id')->on('talents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
