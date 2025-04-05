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
        Schema::create('solves', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('participant_id')->constrained('participants')->onDelete('cascade');
            $table->foreignId('problem_id')->constrained('problems')->onDelete('cascade');
            $table->string('file');
            $table->enum('status',['accepted','process','reject','pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solves');
    }
};
