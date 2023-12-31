<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Tambahkan 10 user dengan data palsu
        User::factory()->count(10)->create();
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'role' => 'Admin',
        //     'password' => Hash::make('123456')
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'guru',
        //     'email' => 'guru@gmail.com',
        //     'role' => 'Guru',
        //     'password' => Hash::make('123456')
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'siswa',
        //     'email' => 'siswa@gmail.com',
        //     'role' => 'Siswa',
        //     'password' => Hash::make('123456')
        // ]);
    }
}
