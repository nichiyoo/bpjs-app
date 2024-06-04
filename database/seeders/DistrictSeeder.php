<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            ['district_name' => 'PERANAP'],
            ['district_name' => 'BATANG PERANAP'],
            ['district_name' => 'RAKIT KULIM'],
            ['district_name' => 'SEBERIDA'],
            ['district_name' => 'BATANG CENAKU'],
            ['district_name' => 'BATANG GANSAL'],
            ['district_name' => 'KELAYANG'],
            ['district_name' => 'SUNGAL LALA'],
            ['district_name' => 'PASIR PENYU'],
            ['district_name' => 'LUBUK BATU JAYA'],
            ['district_name' => 'LIRIK'],
            ['district_name' => 'RENGAT BARAT'],
            ['district_name' => 'RENGAT'],
            ['district_name' => 'KUALA CENAKU']
        ];

        foreach ($districts as $districtName) {
            District::create([
                'name' => Str::title($districtName['district_name'])
            ]);
        }
    }
}
