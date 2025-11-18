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
        Schema::create('station_judges', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('parent_court');
            $table->date('dob')->nullable();
            $table->string('stream');
            $table->date('elevation_date');
            $table->string('stationing');
            $table->text('biography')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_judges');
    }
};
