<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('national_no')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->string('nationality')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('user_type', ['admin', 'user', 'child'])->default('admin');
            $table->json('attachments')->nullable();
            $table->string('password');
            $table->string('status')->default('pending');
            $table->string('company_name')->nullable();
            $table->string('street_addr_1')->nullable();
            $table->string('street_addr_2')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('pin_code')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkdin_url')->nullable();
            $table->string('child_name')->nullable();
            $table->integer('age')->nullable();
            $table->string('school_name')->nullable();
            $table->integer('std_year')->nullable();
            $table->string('allergies')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('parent_contact')->nullable();
            $table->string('parent_email')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->text('inspiration')->nullable();
            $table->text('business_experience')->nullable();
            $table->text('hobbies')->nullable();
            $table->text('business_ideas')->nullable();
            $table->text('subjects')->nullable();
            $table->string('favourite_subject')->nullable();
            $table->string('future_aspirations')->nullable();
            $table->string('consent')->nullable();
            $table->date('consent_date')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
