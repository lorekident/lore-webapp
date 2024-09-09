<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'is_admin' => 0,
            'name' => $this->faker->name,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
