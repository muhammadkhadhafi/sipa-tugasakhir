<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\Data\KategoriPembayaran;
use App\Models\Admin\Data\SuratKeteranganAktifCatatan;
use App\Models\Admin\Data\WisudaHarga;
use App\Models\Admin\Data\WisudaKategoriPembayaran;
use App\Models\Admin\MasterData\Pegawai;
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
        Pegawai::factory(5)->create();

        Pegawai::create([
            'nama' => 'Muhammad Khadafi',
            'username' => 'khadafi',
            'nip' => '12345678901234567',
            'jenis_kelamin' => 1,
            'agama' => 1,
            'tempat_lahir' => 'Kendawangan',
            'tanggal_lahir' => '2001-10-05',
            'password' => bcrypt('password'),
            'is_masterdata' => true
        ]);

        SuratKeteranganAktifCatatan::create([
            'kontak_admin' => 'Ibu Irul/ +62 878-2765-0024',
        ]);

        WisudaHarga::create([
            'harga' => 400000
        ]);
    }
}
