<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\MasterData\Mahasiswa;
use App\Models\Admin\MasterData\Pegawai;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Pegawai::factory(10)->create();

        Pegawai::create([
            'nama' => 'Muhammad Khadafi',
            'username' => 'khadafi',
            'nip' => '12345678901234567',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'tempat_lahir' => 'Kendawangan',
            'tanggal_lahir' => '2001-10-05',
            'password' => bcrypt('password'),
            'is_masterdata' => true
        ]);

        Mahasiswa::create([
            'nama' => 'Muhammad Khadafi',
            'nim' => '3042020026',
            'program_studi' => 'Teknologi Informasi',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'tempat_lahir' => 'Kendawangan',
            'tanggal_lahir' => '2001-10-05',
            'password' => bcrypt('password')
        ]);

        Mahasiswa::create([
            'nama' => 'Fathur Rahman',
            'nim' => '3042020013',
            'program_studi' => 'Teknologi Informasi',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'tempat_lahir' => 'Kendawangan',
            'tanggal_lahir' => '2001-10-05',
            'password' => bcrypt('password')
        ]);
    }
}
