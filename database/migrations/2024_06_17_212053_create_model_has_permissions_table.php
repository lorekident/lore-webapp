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
        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table->uuid('model_id');
            $table->string('model_type');
            $table->unsignedBigInteger('permission_id'); // Assuming `permission_id` is still an unsignedBigInteger
            $table->timestamps();

            // Add foreign key constraint if `permission_id` references the `id` in the `permissions` table.
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            $table->primary(['model_id', 'model_type', 'permission_id']); // Composite primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_has_permissions');
    }
};
