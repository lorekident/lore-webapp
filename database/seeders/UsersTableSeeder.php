<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create()->each(function ($user) {
            Profile::factory()->create([
                'user_id' => $user->id,
                'child_name' => $user->name
            ]);
        });
    }
}
