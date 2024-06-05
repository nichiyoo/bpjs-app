<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(VillageSeeder::class);
        $this->call(OfficerSeeder::class);
        $this->call(SurveySeeder::class);
        $this->call(ProgressSeeder::class);
        $this->call(HouseholdSeeder::class);
    }
}
