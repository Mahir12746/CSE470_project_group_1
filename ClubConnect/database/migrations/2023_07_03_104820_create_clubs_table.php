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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('club_name');
            $table->string('club_location');
            $table->string('club_logo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
