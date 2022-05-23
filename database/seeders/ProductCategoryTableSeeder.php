<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            'category' => 'category1',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('product_categories')->insert([
            'category' => 'category2',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('product_categories')->insert([
            'category' => 'category3',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('product_categories')->insert([
            'category' => 'category4',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
