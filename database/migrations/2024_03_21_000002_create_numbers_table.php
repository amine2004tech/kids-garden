<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->integer('stars');
            $table->string('voice');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('numbers');
    }
}; 