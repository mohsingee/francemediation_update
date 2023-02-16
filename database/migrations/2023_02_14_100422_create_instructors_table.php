<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->text('profession_title');
            $table->string('area_code');
            $table->string('phone_number');
            $table->text('address');
            $table->string('postal_code');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('gender');
            $table->text('facebook');
            $table->text('twitter');
            $table->text('linkedin');
            $table->text('pinterest');
            $table->longText('about_instructor');
            $table->longText('profile');
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
        Schema::dropIfExists('instructors');
    }
}
