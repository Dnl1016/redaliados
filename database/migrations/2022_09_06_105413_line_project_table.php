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
        Schema::create('line_project', function (Blueprint $table) {
            $table->bigInteger('lines_id')->unsigned();
            $table->foreign('lines_id')->references('id')->on('lines');

            $table->bigInteger('projects_id')->unsigned();
            $table->foreign('projects_id')->references('id')->on('projects');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_project');
    }
};
