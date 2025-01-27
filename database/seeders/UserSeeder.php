<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' => "Administrator",
        //     'username' => 'admin',
        //     'password' => Hash::make('admin'),
        //     'role' => 'admin',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        DB::table('users')->insert([
            'name' => "Staff Gudang",
            'username' => 'staff',
            'password' => Hash::make('staff'),
            'role' => 'staff',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => "Pemilik UD. Erni",
            'username' => 'erni',
            'password' => Hash::make('erni'),
            'role' => 'pemilik',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
