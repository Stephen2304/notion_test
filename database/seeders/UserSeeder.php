<?php

namespace Database\Seeders;


use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $timezones = ['CET', 'CST', 'GMT+1'];

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'timezone' => $faker->randomElement($timezones),
            ]);
        }
    }
}
