<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        $users = [
            ['user_name' => 'HERWIN OKTAVIAN'],
            ['user_name' => 'NAWAN ALFIANO'],
            ['user_name' => 'ELI SUKRIANI'],
            ['user_name' => 'TRI WAHYU'],
            ['user_name' => 'ADE MAIYORA'],
            ['user_name' => 'HARISKA YUNILA'],
            ['user_name' => 'RANGGA LESMANA'],
            ['user_name' => 'INDAH PARAMITA'],
            ['user_name' => 'AYU ERLINA'],
            ['user_name' => 'BUDIMAN'],
            ['user_name' => 'MAI LINDA'],
            ['user_name' => 'SAHMONO'],
            ['user_name' => 'SUMARNI'],
            ['user_name' => 'NURITA'],
            ['user_name' => 'SURATMIN UJANG'],
            ['user_name' => 'DESTI KRISTIARINI'],
            ['user_name' => 'AGUS SANTOSO'],
            ['user_name' => 'ARYA PERMANA'],
            ['user_name' => 'DESLIANI'],
            ['user_name' => 'RIZA DESWITA'],
            ['user_name' => 'WIWIT MAYASARI'],
            ['user_name' => 'MERRY SUSANTI SIREGAR'],
            ['user_name' => 'REZA FAHLEPI'],
            ['user_name' => 'ENDAH PRAMUSINTA'],
            ['user_name' => 'KISWONDO'],
            ['user_name' => 'ASIH KINANTI'],
            ['user_name' => 'YURIKE NURJANNAH'],
            ['user_name' => 'SUSILAWATI'],
            ['user_name' => 'YUNI HARIYATI'],
            ['user_name' => 'DESSY WARDIATI'],
            ['user_name' => 'SURATNO'],
            ['user_name' => 'EKA SAPUTRA'],
            ['user_name' => 'ALFA DYAH SA\'DAH'],
            ['user_name' => 'MIYA ANRIA UMI'],
            ['user_name' => 'DANIEL MUSTAKIM'],
            ['user_name' => 'ARYA PUTRA'],
            ['user_name' => 'AYU NOPIANI'],
            ['user_name' => 'FITRIANA'],
            ['user_name' => 'WIHDATUL JAMANGAH'],
            ['user_name' => 'ATIT INA NURYANTI'],
            ['user_name' => 'RIRI ROSTIANA'],
            ['user_name' => 'FITRIANI'],
        ];

        foreach ($users as $user) {
            User::factory()->create([
                'name' => Str::title($user['user_name']),
                'username' => Str::slug($user['user_name'], '.'),
                'email' => Str::slug($user['user_name'], '.') . '@example.com',
            ]);
        }
    }
}
