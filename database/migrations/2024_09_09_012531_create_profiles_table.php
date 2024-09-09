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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->integer('age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('dob');
            $table->string('school_name');
            $table->string('year_level');
            $table->string('allergies');
            $table->string('guardian_name');
            $table->string('guardian_phone');
            $table->string('guardian_email');
            $table->string('address');
            $table->string('city');
            $table->string('emergency_contact_name');
            $table->string('emergency_phone');
            $table->string('relationship');
            $table->string('inspiration');
            $table->string('previous_business');
            $table->string('hobbies');
            $table->text('business_idea');
            $table->string('favorite_subject');
            $table->string('aspiration');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
