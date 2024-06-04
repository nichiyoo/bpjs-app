<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Officer;
use App\Models\User;
use App\Models\Village;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
    }
}
