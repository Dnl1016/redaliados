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
        Schema::create('allies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->string('document')->unique();
            $table->string('phone', 30);
            $table->text('address');
            $table->string('nodeName');
            $table->string('region', 50);
            $table->string('formatiionCenter', 50);

            $table->bigInteger('lines_id')->unsigned();
            $table->foreign('lines_id')->references('id')->on('lines');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
