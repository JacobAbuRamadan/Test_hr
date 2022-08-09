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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('university');
            $table->string('major');
            $table->string('graduation_year');
            $table->string('birthday');
            $table->string('adress');
            $table->enum('status',['available','not_available'])-> default('available');
            $table->integer('phone_num');
            $table->string('personal_photo');
            $table->string('college_degree');
            $table->string('cv');
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
        Schema::dropIfExists('employees');
    }
};
