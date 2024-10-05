<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
        // Créer une instance de Faker
        $faker = Faker::create();

        $timezones = ['CET', 'CST', 'GMT+1'];

        $users = User::all();

        foreach ($users as $user) {
            $name = $faker->firstName();
            $newTimezone = $faker->randomElement($timezones);

            $user->update([
                'name' => $name,
                'timezone' => $newTimezone,
            ]);

            Log::info("[" . $user->id . "] firstname: {$name}, timezone: '{$newTimezone}'");

            $this->info("[" . $user->id . "] firstname: {$name}, timezone: '{$newTimezone}'");
        }

        $this->info('All users have been updated and logged successfully.');
    }
}
