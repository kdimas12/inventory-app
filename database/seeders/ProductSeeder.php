<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'category_id' => 3,
            'code' => 'PRD0001',
            'name' => 'Indomie Goreng',
            'unit' => 'pcs',
            'buy_price' => 2500,
            'sell_price' => 3000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'category_id' => 3,
            'code' => 'PRD0002',
            'name' => 'Mie Sedap Goreng',
            'unit' => 'pcs',
            'buy_price' => 2500,
            'sell_price' => 3000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'category_id' => 3,
            'code' => 'PRD0003',
            'name' => 'Mie Sedap Kuah',
            'unit' => 'pcs',
            'buy_price' => 2500,
            'sell_price' => 3000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Minuman id = 4
        DB::table('products')->insert([
            'category_id' => 4,
            'code' => 'PRD0004',
            'name' => 'Aqua 600ml',
            'unit' => 'pcs',
            'buy_price' => 2700,
            'sell_price' => 3000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'category_id' => 4,
            'code' => 'PRD0005',
            'name' => 'Teh Botol',
            'unit' => 'pcs',
            'buy_price' => 2500,
            'sell_price' => 3000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
