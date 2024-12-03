<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Major;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Major::factory(50)->create();
        User::factory(10)->create();
        Admin::factory(5)->create();
        Doctor::factory(30)->create();


        // User::factory()->create([
        //    'name' => "test name",
        //     'email' => "test@test.com",
        //     'email_verified_at' => now(),
        //     'role' => "doctor",
        //     'major_id' =>  1  ,
        //     'image' => "1.png",
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

    }
}
