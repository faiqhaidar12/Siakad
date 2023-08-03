<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PenggunaFactory extends Factory
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
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'role' => 'Siswa', // perhatikan tidak ada tanda kurung tambahan
            'password' => Hash::make('123456'), // password
        ];
    }
}
