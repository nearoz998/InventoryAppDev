<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'product1',
            'weight' => '123',
            'size' => '123',
            'unit_id' => '1',
            'category_id' => '1',
            'service_rate' => '1000',
            'price' =>'800',
            'supplier_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'name' => 'product2',
            'weight' => '123',
            'size' => '123',
            'unit_id' => '2',
            'category_id' => '2',
            'service_rate' => '1000',
            'price' =>'800',
            'supplier_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'name' => 'product3',
            'weight' => '123',
            'size' => '123',
            'unit_id' => '3',
            'category_id' => '3',
            'service_rate' => '1000',
            'price' =>'800',
            'supplier_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
