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
    Schema::create('match_requests', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('club_id');
        $table->unsignedBigInteger('team2_id');
        $table->dateTime('match_datetime');
        $table->string('stadium');
        $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
        $table->timestamps();

        $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
        $table->foreign('team2_id')->references('id')->on('clubs')->onDelete('cascade');
    });
}
    public function down(): void
    {
        Schema::dropIfExists('match_requests');
    }
};
