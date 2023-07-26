<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('position')->nullable();
            $table->string('expeirence')->nullable();
            $table->string('pimage')->nullable();
            $table->string('goals')->nullable();
            $table->string('assists')->nullable();
            $table->string('minsplayed')->nullable();
            $table->string('club')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
