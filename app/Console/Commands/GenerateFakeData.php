<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateFakeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            User::factory()->create([
                'name' => fake()->name(),
                'username' => fake()->unique()->userName(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'roles' => 'User',
                'remember_token' => Str::random(10),
            ]);
        }

        $this->info('Fake data generated successfully!');
    }
}
