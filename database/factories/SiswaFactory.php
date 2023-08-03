<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        return [
            'nama_siswa' => $faker->name(),
            'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
            'tanggal_lahir' => $faker->date(),
            'alamat' => $faker->address(),
            'no_telepon_orang_tua' => $faker->phoneNumber(),
            'kelas_id' => Kelas::pluck('id')->random(),
        ];
    }
}
