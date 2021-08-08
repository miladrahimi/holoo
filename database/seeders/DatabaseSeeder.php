<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'milad',
            'email' => 'realmiladrahimi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
