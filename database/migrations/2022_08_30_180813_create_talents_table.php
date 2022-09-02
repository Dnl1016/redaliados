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
        Schema::create('talents', function (Blueprint $table) {
            $table->id();
            $table->string('jobTittle');
            $table->string('businessName');
            $table->string('indrustyRegistration', 50);
            $table->enum('typeTalents',['Natural','Juridico']);
            $table->enum('educationalLevel',['Ingeniero','Tecnologo']);
            $table->text('productDescription');
            $table->string('announcement')->nullable();

           $table->bigInteger('people_id')->unsigned();
           $table->foreign('people_id')->references('id')->on('people');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talents');
    }
};
