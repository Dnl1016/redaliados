<?php
use App\Models\User;
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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('verified')->default(User::USUARIO_NO_VERIFICADO);
            $table->string('admin')->default(User::USUARIO_REGULAR);
            $table->string('verification_token')->nullable();
            $table->string('status')->default('unavailable');
            $table->timestamps();
            


            $table->bigInteger('people_id')->unsigned();
            $table->foreign('people_id')->references('id')->on('people');

            $table->bigInteger('allies_id')->unsigned();
            $table->foreign('allies_id')->references('id')->on('allies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
