<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RecruiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test recruiter account
        User::create([
            'name' => 'John Recruiter',
            'email' => 'recruiter@test.com',
            'password' => Hash::make('password123'),
            'role' => 'recruiter'
        ]);

        // Create another test recruiter
        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@test.com',
            'password' => Hash::make('password123'),
            'role' => 'recruiter'
        ]);
    }
}
