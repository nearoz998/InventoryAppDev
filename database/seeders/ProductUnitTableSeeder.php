<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_units')->insert([
            'unit' => 'Kgs',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('product_units')->insert([
            'unit' => 'Ltr',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('product_units')->insert([
            'unit' => 'Pcs',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('product_units')->insert([
            'unit' => 'Meters',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
