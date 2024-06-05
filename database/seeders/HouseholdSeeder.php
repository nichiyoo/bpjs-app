<?php

namespace Database\Seeders;

use App\Models\Household;
use App\Models\Officer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HouseholdSeeder extends Seeder
{
    protected array $types = ['IPDS', 'Produksi'];
    protected array $categories = ['Seruti', 'Susenas'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Household::create([
                'nks' => Officer::all()->random()->nks,
                'category' => fake()->randomElement($this->categories),
                'type' => fake()->randomElement($this->types),
                'before' => fake()->numberBetween(1, 100),
                'after' => fake()->numberBetween(1, 100),
                'household' => fake()->numberBetween(1, 100),
            ]);
        }
    }
}
