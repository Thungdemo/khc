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
        Schema::create('registry_officials', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('designation');
            $table->date('dob')->nullable();
            $table->string('qualification')->nullable();;
            $table->string('phone_no',50)->nullable();;
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->integer('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registry_officials');
    }
};
