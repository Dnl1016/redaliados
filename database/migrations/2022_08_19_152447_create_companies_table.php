<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id_company');
            $table->string('tradename', 50);
            $table->string('address', 50);
            $table->string('tax_regime', 50);
            $table->string('economic_sector', 50);
            $table->string('main_activity', 50);
            $table->string('legal_nature', 50);
            $table->string('legal_representative', 50);
            $table->string('representative_document', 50);
            $table->string('commercial_register', 50);
            $table->string('industry_registration', 50);
            $table->string('product_description', 50);
            $table->integer('id_talent');
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
}
