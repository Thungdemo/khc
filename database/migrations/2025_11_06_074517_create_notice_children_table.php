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
        Schema::create('notice_children', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('filename')->nullable();
            $table->foreignId('notice_id')->constrained('notices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notice_children');
    }
};
