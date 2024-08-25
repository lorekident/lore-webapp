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
        Schema::create('filables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('filable_id', 36)->nullable();
            $table->string('filable_type', 100)->nullable();
            $table->string('filename')->nullable();
            $table->string('path')->nullable();
            $table->timestamps();
            // Index for polymorphic relation
            $table->index(['filable_id', 'filable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filables');
    }
};
