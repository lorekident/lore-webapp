<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => (string) Str::uuid(),
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('1234567890'),
                'phone_number' => '+2674665577',
                'national_no' => '0123456789',
                'nationality' => 'Botswana',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'status' => 'active',
            ],
        ];
        
        foreach ($users as $key => $value) {
            $user = User::create($value);
            $user->assignRole('admin');
        }
    }
}
