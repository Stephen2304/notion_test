<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Console\Command;

class UpdateUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-users-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates users\' first name, last name, and timezone to new random ones';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = Faker::create();

        $timezones = ['CET', 'CST', 'GMT+1'];

        $users = User::all();

        foreach ($users as $user) {
            $user->update([
                'name' => $faker->firstName, 
                'email' => $faker->lastName . '@example.com', 
                'timezone' => $faker->randomElement($timezones), 
            ]);
        }

        $this->info('Users have been updated successfully.');
    }
}
