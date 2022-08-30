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
            $table->string('jobTittle', 50);
            $table->string('businessName', 50);
            $table->string('indrustyRegistration', 50);
            $table->string('typeTalents')->default('natural');
            $table->string('productDescription', 300);
            $table->string('educationalLevel', 50);

           // $table->bigInteger('people_id')->unsigned();
           //$table->foreign('people_id')->references('id')->on('people');

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
