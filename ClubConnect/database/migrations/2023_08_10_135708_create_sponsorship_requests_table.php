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
        Schema::create('sponsorship_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('sponsor_id');
            $table->string('image_path');
            $table->string('value')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('sponsor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorship_requests');
    }
};
