<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        for($i = 0; $i < 10; $i++) {
            User::factory()->create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'password' => Hash::make('password123'),
            ]);
        }
        for($i = 0; $i < 20; $i++) {
            \App\Models\Post::create([
                'content' => fake()->realText(),
                'user_id' => fake()->randomDigit() + 1,
            ]);
        }
    }
}
