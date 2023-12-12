<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        'password' => 'admin123',
        ]);
        User::factory()->create([
            'name' => 'Frank Leimbergh D. Armodia',
            'email' => 'farmodia@gmail.com',
            'password' => 'admin123',
        ]);

        Course::factory()->create([
            'name' => 'Bachelor of Science in Information Technology'
        ]);

        Course::factory()->create([
            'name' => 'Bachelor of Science in Agriculture major in Horticulture'
        ]);
        Course::factory()->create([
            'name' => 'Bachelor of Science in Civil Engineering'
        ]);
        Subject::create([
            'code' => 'IT 224',
            'description' => 'Information Management',
        ]);

        Student::factory()->create([
            'school_id' => '2022-00360',
            'name' => 'Frank Leimbergh D. Armodia',
            'password' => Hash::make('armodia_fl')
        ]);
    }
}
