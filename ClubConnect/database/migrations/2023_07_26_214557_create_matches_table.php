<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team2_id');
            $table->dateTime('match_datetime');
            $table->string('stadium');
            $table->string('status')->default('Approved');
            $table->timestamps();
            $table->string('sponsor_picture')->nullable();

            // Foreign keys
            $table->foreign('team1_id')->references('id')->on('clubs');
            $table->foreign('team2_id')->references('id')->on('clubs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
