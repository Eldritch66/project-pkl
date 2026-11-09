<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'petugas'],
            [
                'name' => 'Petugas Bakesbangpol',
                'email' => 'petugas@simardi.local',
                'password' => 'petugas123',
                'role' => 'petugas',
            ],
        );

        User::updateOrCreate(
            ['username' => 'pemohon'],
            [
                'name' => 'Pemohon SIMARDI',
                'email' => 'pemohon@simardi.local',
                'password' => 'pemohon123',
                'role' => 'pemohon',
            ],
        );
    }
}
