<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purchase_details')->insert([
            'purchase_id' => 1,
            'product_id' => 1,
            'quantity' => 10,
            'price' => 10000,
            'expired_date' => '2021-12-31',
        ]);
    }
}
