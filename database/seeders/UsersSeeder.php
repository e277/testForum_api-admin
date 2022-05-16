<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin One',
            'is_admin' => User::IS_ADMIN,
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
    }
}
