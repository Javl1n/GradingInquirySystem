<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create();

        User::factory()->create([
            'name' => 'John Cator',
            'email' => 'jcator@gmail.com',
            'admin' => true,
            'password' => 'admin123',
        ]);
        User::factory()->create([
            'name' => 'Frank Leimbergh D. Armodia',
            'email' => 'farmodia@gmail.com',
            'admin' => true,
            'password' => 'admin123',
        ]);

        Course::factory(3)->create();
    }
}
