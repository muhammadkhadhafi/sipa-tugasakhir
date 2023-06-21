<?php

namespace Database\Factories\Admin\MasterData;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\MasterData\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'nip' => fake()->unique()->nik(),
            'jenis_kelamin' => mt_rand(1, 2),
            'agama' => mt_rand(1, 6),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date('Y-m-d'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ];
    }
}
