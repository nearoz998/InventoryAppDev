<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            'tax' => '0',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('taxes')->insert([
            'tax' => '5',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('taxes')->insert([
            'tax' => '10',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('taxes')->insert([
            'tax' => '13',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
