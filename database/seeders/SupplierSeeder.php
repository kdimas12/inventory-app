<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            'name' => "PT. Indofood",
            'contact_person' => 'Budi',
            'phone' => '021-1234567',
            'address' => 'Kabanjahe',
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('suppliers')->insert([
            'name' => "PT. Mayora",
            'contact_person' => 'Agus',
            'phone' => '021-7654321',
            'address' => 'Jl. Raya Bekasi',
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
