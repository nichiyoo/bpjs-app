<?php

namespace Database\Seeders;

use App\Models\Officer;
use App\Models\User;
use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officers = [
            [
                'nks' => '100102',
                'user_name' => 'HERWIN OKTAVIAN',
                'village_name' => 'PUNTI KAYU'
            ],
            [
                'nks' => '100229',
                'user_name' => 'NAWAN ALFIANO',
                'village_name' => 'TALANG BERSEMI'
            ],
            [
                'nks' => '100372',
                'user_name' => 'ELI SUKRIANI',
                'village_name' => 'SIAMBUL'
            ],
            [
                'nks' => '100849',
                'user_name' => 'TRI WAHYU',
                'village_name' => 'BARANGAN'
            ],
            [
                'nks' => '100726',
                'user_name' => 'ADE MAIYORA',
                'village_name' => 'PERKEBUNAN SUNGAI LALA'
            ],
            [
                'nks' => '100981',
                'user_name' => 'HARISKA YUNILA',
                'village_name' => 'SUNGAI GUNTUNG HILIR'
            ],
            [
                'nks' => '100246',
                'user_name' => 'RANGGA LESMANA',
                'village_name' => 'ANAK TALANG'
            ],
            [
                'nks' => '100394',
                'user_name' => 'INDAH PARAMITA',
                'village_name' => 'SUNGAI AKAR'
            ],
            [
                'nks' => '100574',
                'user_name' => 'AYU ERLINA',
                'village_name' => 'KUANTAN TENANG'
            ],
            [
                'nks' => '100128',
                'user_name' => 'BUDIMAN',
                'village_name' => 'SELUNAK'
            ],
            [
                'nks' => '100779',
                'user_name' => 'MAI LINDA',
                'village_name' => 'RIMPIAN'
            ],
            [
                'nks' => '150376',
                'user_name' => 'SAHMONO',
                'village_name' => 'KAMPUNG DAGANG'
            ],
            [
                'nks' => '101038',
                'user_name' => 'SUMARNI',
                'village_name' => 'KUALA MULYA'
            ],
            [
                'nks' => '100273',
                'user_name' => 'NURITA',
                'village_name' => 'ALIM'
            ],
            [
                'nks' => '100415',
                'user_name' => 'SURATMIN UJANG',
                'village_name' => 'SEBERIDA'
            ],
            [
                'nks' => '150290',
                'user_name' => 'DESTI KRISTIARINI',
                'village_name' => 'SUNGAI SAGU'
            ],
            [
                'nks' => '100742',
                'user_name' => 'AGUS SANTOSO',
                'village_name' => 'PASIR SELABAU'
            ],
            [
                'nks' => '100874',
                'user_name' => 'ARYA PERMANA',
                'village_name' => 'KOTA LAMA'
            ],
            [
                'nks' => '100998',
                'user_name' => 'DESLIANI',
                'village_name' => 'KAMPUNG PULAU'
            ],
            [
                'nks' => '100004',
                'user_name' => 'RIZA DESWITA',
                'village_name' => 'SEMELINANG TEBING'
            ],
            [
                'nks' => '100604',
                'user_name' => 'WIWIT MAYASARI',
                'village_name' => 'PETONGGAN'
            ],
            [
                'nks' => '100430',
                'user_name' => 'MERRY SUSANTI SIREGAR',
                'village_name' => 'TALANG LAKAT'
            ],
            [
                'nks' => '150397',
                'user_name' => 'HARISKA YUNILA',
                'village_name' => 'KAMPUNG BESAR KOTA'
            ],
            [
                'nks' => '100039',
                'user_name' => 'REZA FAHLEPI',
                'village_name' => 'PAUH RANAP'
            ],
            [
                'nks' => '100895',
                'user_name' => 'ENDAH PRAMUSINTA',
                'village_name' => 'PEMATANG JAYA'
            ],
            [
                'nks' => '100451',
                'user_name' => 'ELI SUKRIANI',
                'village_name' => 'RINGIN'
            ],
            [
                'nks' => '150427',
                'user_name' => 'DESLIANI',
                'village_name' => 'SEKIP HULU'
            ],
            [
                'nks' => '150171',
                'user_name' => 'KISWONDO',
                'village_name' => 'AIR MOLEK I'
            ],
            [
                'nks' => '101065',
                'user_name' => 'SUMARNI',
                'village_name' => 'SUKA JADI'
            ],
            [
                'nks' => '100148',
                'user_name' => 'RIZA DESWITA',
                'village_name' => 'KOTO TUO'
            ],
            [
                'nks' => '100291',
                'user_name' => 'NURITA',
                'village_name' => 'AUR CINA'
            ],
            [
                'nks' => '100467',
                'user_name' => 'SURATMIN UJANG',
                'village_name' => 'DANAU RAMBAI'
            ],
            [
                'nks' => '150197',
                'user_name' => 'KISWONDO',
                'village_name' => 'CANDIREJO'
            ],
            [
                'nks' => '100913',
                'user_name' => 'ARYA PERMANA',
                'village_name' => 'TALANG JERINJING'
            ],
            [
                'nks' => '100048',
                'user_name' => 'ASIH KINANTI',
                'village_name' => 'BATURIJAL HILIR'
            ],
            [
                'nks' => '100760',
                'user_name' => 'AGUS SANTOSO',
                'village_name' => 'TANJUNG DANAU'
            ],
            [
                'nks' => '150350',
                'user_name' => 'YURIKE NURJANNAH',
                'village_name' => 'PEMATANG REBA'
            ],
            [
                'nks' => '150456',
                'user_name' => 'SUSILAWATI',
                'village_name' => 'RANTAU MAPESAI'
            ],
            [
                'nks' => '150004',
                'user_name' => 'ASIH KINANTI',
                'village_name' => 'PERANAP'
            ],
            [
                'nks' => '100311',
                'user_name' => 'NAWAN ALFIANO',
                'village_name' => 'BUKIT LIPAI'
            ],
            [
                'nks' => '100675',
                'user_name' => 'YUNI HARIYATI',
                'village_name' => 'SEKO LUBUK TIGO'
            ],
            [
                'nks' => '100932',
                'user_name' => 'DESSY WARDIATI',
                'village_name' => 'PEKAN HERAN'
            ],
            [
                'nks' => '100628',
                'user_name' => 'SURATNO',
                'village_name' => 'TALANG DURIAN CACAR'
            ],
            [
                'nks' => '100704',
                'user_name' => 'DESTI KRISTIARINI',
                'village_name' => 'REDANG SEKO'
            ],
            [
                'nks' => '100076',
                'user_name' => 'HERWIN OKTAVIAN',
                'village_name' => 'PANDAN WANGI'
            ],
            [
                'nks' => '100325',
                'user_name' => 'EKA SAPUTRA',
                'village_name' => 'KUALA KILAN'
            ],
            [
                'nks' => '150321',
                'user_name' => 'YUNI HARIYATI',
                'village_name' => 'SUKAJADI'
            ],
            [
                'nks' => '100955',
                'user_name' => 'ENDAH PRAMUSINTA',
                'village_name' => 'TANI MAKMUR'
            ],
            [
                'nks' => '101016',
                'user_name' => 'ALFA DYAH SA\'DAH',
                'village_name' => 'RAWA BANGUN'
            ],
            [
                'nks' => '100494',
                'user_name' => 'MIYA ANRIA UMI',
                'village_name' => 'POLAK PISANG'
            ],
            [
                'nks' => '100649',
                'user_name' => 'WIWIT MAYASARI',
                'village_name' => 'TALANG SUKA MAJU'
            ],
            [
                'nks' => '100344',
                'user_name' => 'DANIEL MUSTAKIM',
                'village_name' => 'KEPAYANG SARI'
            ],
            [
                'nks' => '100512',
                'user_name' => 'MIYA ANRIA UMI',
                'village_name' => 'PELANGKO'
            ],
            [
                'nks' => '150229',
                'user_name' => 'ARYA PUTRA',
                'village_name' => 'TANJUNG GADING'
            ],
            [
                'nks' => '100530',
                'user_name' => 'AYU NOPIANI',
                'village_name' => 'BONGKAL MALANG'
            ],
            [
                'nks' => '150261',
                'user_name' => 'FITRIANA',
                'village_name' => 'TANAH MERAH'
            ],
            [
                'nks' => '100168',
                'user_name' => 'WIHDATUL JAMANGAH',
                'village_name' => 'PAYA RUMBAI'
            ],
            [
                'nks' => '100809',
                'user_name' => 'MAI LINDA',
                'village_name' => 'KULIM JAYA'
            ],
            [
                'nks' => '150037',
                'user_name' => 'ATIT INA NURYANTI',
                'village_name' => 'KELESA'
            ],
            [
                'nks' => '100543',
                'user_name' => 'AYU ERLINA',
                'village_name' => 'SUNGAI KUNING BENIO'
            ],
            [
                'nks' => '100830',
                'user_name' => 'FITRIANA',
                'village_name' => 'PONTIAN MEKAR'
            ],
            [
                'nks' => '100208',
                'user_name' => 'RIRI ROSTIANA',
                'village_name' => 'PETALA BUMI'
            ],
            [
                'nks' => '150062',
                'user_name' => 'RIRI ROSTIANA',
                'village_name' => 'TITIAN RESAK'
            ],
            [
                'nks' => '150089',
                'user_name' => 'WIHDATUL JAMANGAH',
                'village_name' => 'PANGKALAN KASAI'
            ],
            [
                'nks' => '150120',
                'user_name' => 'FITRIANI',
                'village_name' => 'PANGKALAN KASAI'
            ],
            [
                'nks' => '150142',
                'user_name' => 'ATIT INA NURYANTI',
                'village_name' => 'BULUH RAMPAI'
            ],
        ];

        foreach ($officers as $officer) {
            Officer::create([
                'nks' => $officer['nks'],
                'user_id' => User::where('name', Str::title($officer['user_name']))->first()->id,
                'village_id' => Village::where('name', Str::title($officer['village_name']))->first()->id,
            ]);
        }
    }
}
