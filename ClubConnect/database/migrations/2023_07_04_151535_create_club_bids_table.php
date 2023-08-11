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
        Schema::create('club_bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('player_id');
            $table->integer('bid_number');
            $table->boolean('is_accepted')->default(false);
            $table->timestamps();

            $table->foreign('club_id')->references('user_id')->on('clubs');
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('club_bids');
    }

};
