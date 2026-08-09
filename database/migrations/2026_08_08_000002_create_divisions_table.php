<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('title');
            $table->string('icon')->default('🏢');
            $table->enum('status', ['live', 'loader', 'disabled'])->default('loader');
            $table->text('subtitle')->nullable();
            $table->boolean('is_custom')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('divisions');
    }
};
