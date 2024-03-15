<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrolment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Studenta',
            'username' => "c35" . strval(fake()->randomNumber(5, true)),
            'email' => 'studenta@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'outstanding_balance' => false,
            'role' => "student",
            'department' => null,
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Studentb',
            'username' => "c35" . strval(fake()->randomNumber(5, true)),
            'email' => 'studentb@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'outstanding_balance' => false,
            'role' => "student",
            'department' => null,
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Studentc',
            'username' => "c35" . strval(fake()->randomNumber(5, true)),
            'email' => 'studentc@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'outstanding_balance' => false,
            'role' => "student",
            'department' => null,
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Test Staff',
            'username' => "c35" . strval(fake()->randomNumber(5, true)),
            'email' => 'staff@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'outstanding_balance' => false,
            'role' => "staff",
            'department' => 'computer engineering',
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Test Admin',
            'username' => "c35" . strval(fake()->randomNumber(5, true)),
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'outstanding_balance' => false,
            'role' => "admin",
            'department' => null,
            'remember_token' => Str::random(10),
        ]);

        for ($i = 1; $i <= 10; $i++) {
            Course::factory()->create([
                'title' => fake()->sentence(5),
                'description' => fake()->paragraph(6),
                'fee' => fake()->randomFloat(2, 50, 500)
            ])->enrolments()->saveMany([
                new Enrolment(['user_id' => rand(1, 3), 'course_id' => $i, 'active' => rand(0, 1) == 1, 'created_at' => now(), 'updated_at' => null]),
                new Enrolment(['user_id' => rand(1, 3), 'course_id' => $i, 'active' => rand(0, 1) == 1, 'created_at' => now(), 'updated_at' => null]),
                new Enrolment(['user_id' => rand(1, 3), 'course_id' => $i, 'active' => rand(0, 1) == 1, 'created_at' => now(), 'updated_at' => null]),
                new Enrolment(['user_id' => rand(1, 3), 'course_id' => $i, 'active' => rand(0, 1) == 1, 'created_at' => now(), 'updated_at' => null]),
                new Enrolment(['user_id' => rand(1, 3), 'course_id' => $i, 'active' => rand(0, 1) == 1, 'created_at' => now(), 'updated_at' => null]),
            ]);
        }
    }
}
