<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jersey_no')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('weekly_wages');
            $table->string('picture')->nullable();
            $table->string('skills')->nullable();
            $table->integer('role_id');
            $table->boolean('injury')->default(false);
            $table->integer('stamina')->default(100);
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
        Schema::dropIfExists('players');
    }
}
