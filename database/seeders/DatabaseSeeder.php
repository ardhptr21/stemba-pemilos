<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin'
            ]
        );

        if (env('APP_ENV') == 'local') {
            Student::factory(100)->create();
            Teacher::factory(50)->create();
        }
    }
}
