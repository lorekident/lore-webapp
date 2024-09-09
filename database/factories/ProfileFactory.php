<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'city' => $this->faker->city,
            'dob' => $this->faker->date(),
            'hobbies' => $this->faker->word,
            'aspiration' => $this->faker->word,
            'address' => $this->faker->address,
            'year_level' => $this->faker->word,
            'business_idea' => $this->faker->word,
            'guardian_name' => $this->faker->name,
            'school_name' => $this->faker->company,
            'inspiration' => $this->faker->sentence,
            'child_name' => $this->faker->firstName,
            'favorite_subject' => $this->faker->word,
            'age' => $this->faker->numberBetween(6, 16),
            'guardian_email' => $this->faker->safeEmail,
            'guardian_phone' => $this->faker->phoneNumber,
            'emergency_contact_name' => $this->faker->name,
            'emergency_phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'previous_business' => $this->faker->boolean ? 'Yes' : 'No',
            'relationship' => $this->faker->randomElement(['Mother', 'Father', 'Guardian']),
            'allergies' => $this->faker->randomElement(['None', 'Peanuts', 'Honey', 'Gluten']),
        ];
    }
}
