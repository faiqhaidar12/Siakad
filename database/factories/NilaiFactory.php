<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nilai>
 */
class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'siswa_id' => Siswa::pluck('id')->random(),
            'mapel_id' => Mapel::pluck('id')->random(),
            'kelas_id' => Kelas::pluck('id')->random(),
            'nilai' => $this->faker->randomFloat(2, 0, 100), // Nilai acak dari 0 hingga 100 dengan 2 angka di belakang koma
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
        ];
    }
}
