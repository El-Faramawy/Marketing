<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('code')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('card_number')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('cvv')->nullable();
            $table->enum('block',['yes','no'])->default('no');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->on('cities')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->on('regions')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('price_id')->nullable();
            $table->foreign('price_id')->on('prices')->references('id')->onDelete('cascade');

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
        Schema::dropIfExists('users');
    }
}
