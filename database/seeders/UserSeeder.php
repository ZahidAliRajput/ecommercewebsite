<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => date('Y-m-d'),
            'is_email_verified' => 1,
            'password' => Hash::make("Admin@123#"),
    ];

        $AdminUser = User::create($user);
        $AdminUser->assignRole('Admin');
    }
}
