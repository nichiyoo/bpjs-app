<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villages = [
            [
                'district_name' => 'BATANG PERANAP',
                'village_name' => 'PUNTI KAYU'
            ],
            [
                'district_name' => 'BATANG CENAKU',
                'village_name' => 'TALANG BERSEMI'
            ],
            [
                'district_name' => 'BATANG GANSAL',
                'village_name' => 'SIAMBUL'
            ],
            [
                'district_name' => 'RENGAT BARAT',
                'village_name' => 'BARANGAN'
            ],
            [
                'district_name' => 'SUNGAL LALA',
                'village_name' => 'PERKEBUNAN SUNGAI LALA'
            ],
            [
                'district_name' => 'RENGAT',
                'village_name' => 'SUNGAI GUNTUNG HILIR'
            ],
            [
                'district_name' => 'BATANG CENAKU',
                'village_name' => 'ANAK TALANG'
            ],
            [
                'district_name' => 'BATANG GANSAL',
                'village_name' => 'SUNGAI AKAR'
            ],
            [
                'district_name' => 'RAKIT KULIM',
                'village_name' => 'KUANTAN TENANG'
            ],
            [
                'district_name' => 'BATANG PERANAP',
                'village_name' => 'SELUNAK'
            ],
            [
                'district_name' => 'LUBUK BATU JAYA',
                'village_name' => 'RIMPIAN'
            ],
            [
                'district_name' => 'RENGAT',
                'village_name' => 'KAMPUNG DAGANG'
            ],
            [
                'district_name' => 'KUALA CENAKU',
                'village_name' => 'KUALA MULYA'
            ],
            [
                'district_name' => 'BATANG CENAKU',
                'village_name' => 'ALIM'
            ],
            [
                'district_name' => 'BATANG GANSAL',
                'village_name' => 'SEBERIDA'
            ],
            [
                'district_name' => 'LIRIK',
                'village_name' => 'SUNGAI SAGU'
            ],
            [
                'district_name' => 'SUNGAL LALA',
                'village_name' => 'PASIR SELABAU'
            ],
            [
                'district_name' => 'RENGAT BARAT',
                'village_name' => 'KOTA LAMA'
            ],
            [
                'district_name' => 'RENGAT',
                'village_name' => 'KAMPUNG PULAU'
            ],
            [
                'district_name' => 'PERANAP',
                'village_name' => 'SEMELINANG TEBING'
            ],
            [
                'district_name' => 'RAKIT KULIM',
                'village_name' => 'PETONGGAN'
            ],
            [
                'district_name' => 'BATANG GANSAL',
                'village_name' => 'TALANG LAKAT'
            ],
            [
                'district_name' => 'RENGAT',
                'village_name' => 'KAMPUNG BESAR KOTA'
            ],
            [
                'district_name' => 'PERANAP',
                'village_name' => 'PAUH RANAP'
            ],
            [
                'district_name' => 'RENGAT BARAT',
                'village_name' => 'PEMATANG JAYA'
            ],
            [
                'district_name' => 'BATANG GANSAL',
                'village_name' => 'RINGIN'
            ],
            [
                'district_name' => 'RENGAT',
                'village_name' => 'SEKIP HULU'
            ],
            [
                'district_name' => 'PASIR PENYU',
                'village_name' => 'AIR MOLEK I'
            ],
            [
                'district_name' => 'KUALA CENAKU',
                'village_name' => 'SUKA JADI'
            ],
            [
                'district_name' => 'BATANG PERANAP',
                'village_name' => 'KOTO TUO'
            ],
            [
                'district_name' => 'BATANG CENAKU',
                'village_name' => 'AUR CINA'
            ],
            [
                'district_name' => 'BATANG GANSAL',
                'village_name' => 'DANAU RAMBAI'
            ],
            [
                'district_name' => 'PASIR PENYU',
                'village_name' => 'CANDIREJO'
            ],
            [
                'district_name' => 'RENGAT BARAT',
                'village_name' => 'TALANG JERINJING'
            ],
            [
                'district_name' => 'PERANAP',
                'village_name' => 'BATURIJAL HILIR'
            ],
            [
                'district_name' => 'SUNGAL LALA',
                'village_name' => 'TANJUNG DANAU'
            ],
            [
                'district_name' => 'RENGAT BARAT',
                'village_name' => 'PEMATANG REBA'
            ],
            [
                'district_name' => 'RENGAT',
                'village_name' => 'RANTAU MAPESAI'
            ],
            [
                'district_name' => 'PERANAP',
                'village_name' => 'PERANAP'
            ],
            [
                'district_name' => 'BATANG CENAKU',
                'village_name' => 'BUKIT LIPAI'
            ],
            [
                'district_name' => 'LIRIK',
                'village_name' => 'SEKO LUBUK TIGO'
            ],
            [
                'district_name' => 'RENGAT BARAT',
                'village_name' => 'PEKAN HERAN'
            ],
            [
                'district_name' => 'RAKIT KULIM',
                'village_name' => 'TALANG DURIAN CACAR'
            ],
            [
                'district_name' => 'LIRIK',
                'village_name' => 'REDANG SEKO'
            ],
            [
                'district_name' => 'PERANAP',
                'village_name' => 'PANDAN WANGI'
            ],
            [
                'district_name' => 'BATANG CENAKU',
                'village_name' => 'KUALA KILAN'
            ],
            [
                'district_name' => 'LIRIK',
                'village_name' => 'SUKAJADI'
            ],
            [
                'district_name' => 'RENGAT BARAT',
                'village_name' => 'TANI MAKMUR'
            ],
            [
                'district_name' => 'RENGAT',
                'village_name' => 'RAWA BANGUN'
            ],
            [
                'district_name' => 'KELAYANG',
                'village_name' => 'POLAK PISANG'
            ],
            [
                'district_name' => 'RAKIT KULIM',
                'village_name' => 'TALANG SUKA MAJU'
            ],
            [
                'district_name' => 'BATANG CENAKU',
                'village_name' => 'KEPAYANG SARI'
            ],
            [
                'district_name' => 'KELAYANG',
                'village_name' => 'PELANGKO'
            ],
            [
                'district_name' => 'PASIR PENYU',
                'village_name' => 'TANJUNG GADING'
            ],
            [
                'district_name' => 'KELAYANG',
                'village_name' => 'BONGKAL MALANG'
            ],
            [
                'district_name' => 'PASIR PENYU',
                'village_name' => 'TANAH MERAH'
            ],
            [
                'district_name' => 'SEBERIDA',
                'village_name' => 'PAYA RUMBAI'
            ],
            [
                'district_name' => 'LUBUK BATU JAYA',
                'village_name' => 'KULIM JAYA'
            ],
            [
                'district_name' => 'SEBERIDA',
                'village_name' => 'KELESA'
            ],
            [
                'district_name' => 'KELAYANG',
                'village_name' => 'SUNGAI KUNING BENIO'
            ],
            [
                'district_name' => 'LUBUK BATU JAYA',
                'village_name' => 'PONTIAN MEKAR'
            ],
            [
                'district_name' => 'SEBERIDA',
                'village_name' => 'PETALA BUMI'
            ],
            [
                'district_name' => 'SEBERIDA',
                'village_name' => 'TITIAN RESAK'
            ],
            [
                'district_name' => 'SEBERIDA',
                'village_name' => 'PANGKALAN KASAI'
            ],
            [
                'district_name' => 'SEBERIDA',
                'village_name' => 'PANGKALAN KASAI'
            ],
            [
                'district_name' => 'SEBERIDA',
                'village_name' => 'BULUH RAMPAI'
            ],
        ];

        foreach ($villages as $village) {
            Village::create([
                'name' => Str::title($village['village_name']),
                'district_id' => District::where('name', Str::title($village['district_name']))->first()->id,
            ]);
        }
    }
}
