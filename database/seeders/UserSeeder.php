<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@mail.com',
            'password' => Hash::make('johndoe'),
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@mail.com',
            'password' => Hash::make('janedoe'),
        ]);
    }
}
