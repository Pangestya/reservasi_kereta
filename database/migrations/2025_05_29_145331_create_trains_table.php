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
    Schema::create('trains', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama kereta
        $table->string('route'); // Rute perjalanan
        $table->integer('capacity'); // Kapasitas penumpang
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};