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
        Schema::create('advocate_generals', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('doj');
            $table->date('served_till');
            $table->foreignId('ag_category_id')->constrained('ag_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advocate_generals');
    }
};
