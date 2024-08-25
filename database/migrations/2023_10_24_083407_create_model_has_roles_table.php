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
        Schema::create('model_has_roles', function (Blueprint $table) {
            // Use UUID for the primary key if needed, or simply remove the `id` field.
            // $table->uuid('id')->primary();
            $table->uuid('model_id');
            $table->string('model_type');
            $table->unsignedBigInteger('role_id'); // Assuming `role_id` is still an unsignedBigInteger
            $table->timestamps();

            // Add foreign key constraint if `role_id` references the `id` in the `roles` table.
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->primary(['model_id', 'model_type', 'role_id']); // Composite primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_has_roles');
    }
};
