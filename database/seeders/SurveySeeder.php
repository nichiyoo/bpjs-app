<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    protected array $types = ['IPDS', 'Produksi', 'Distribusi', 'Neraca', 'Sosial'];
    protected array $statuses = ['Berjalan', 'Selesai'];
    protected array $durations = ['Bulanan', 'Tahunan'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 40; $i++) {
            Survey::create([
                'name' => 'Survey ' . $i,
                'start' => fake()->dateTimeBetween('-1 year', 'now'),
                'end' => fake()->dateTimeBetween('-1 year', 'now'),
                'sample' => fake()->numberBetween(1, 100),
                'document' => fake()->numberBetween(1, 100),
                'entry' => fake()->numberBetween(1, 100),
                'status' => fake()->randomElement($this->statuses),
                'duration' => fake()->randomElement($this->durations),
                'type' => fake()->randomElement($this->types),
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
