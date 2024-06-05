<?php

namespace Database\Seeders;

use App\Models\Officer;
use App\Models\Progress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    protected array $answers = [
        'Terisi Lengkap',
        'Terisi Tidak Lengkap',
        'Tidak Ada ART/Responden Yang Dapat Memberi Jawaban',
        'Responden Menolak',
        'Responden Menolak (Tidak Ada ART)',
        'Rumah Tangga Pindah'
    ];
    protected array $types = ['IPDS', 'Produksi'];
    protected array $categories = ['Seruti', 'Susenas'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Progress::create([
                'nks' => Officer::all()->random()->nks,
                'category' => fake()->randomElement($this->categories),
                'type' => fake()->randomElement($this->types),
                'sample' => fake()->numberBetween(1, 100),
                'kor' => fake()->randomElement($this->answers),
                'kp' => fake()->randomElement($this->answers),
            ]);
        }
    }
}
