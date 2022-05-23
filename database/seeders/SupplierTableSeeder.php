<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'name' => 'supplier1',
            'mobile' => '9876589324',
            'address' => 'New Baneshwor, Kathmandu',
            'details' => 'this is detail of the customer \n and this is ok',
            'balance' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('suppliers')->insert([
            'name' => 'supplier2',
            'mobile' => '9876589324',
            'address' => 'New Baneshwor, Kathmandu',
            'details' => 'this is detail of the customer \n and this is ok',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('suppliers')->insert([
            'name' => 'supplier3',
            'mobile' => '9876589324',
            'address' => 'New Baneshwor, Kathmandu',
            'details' => 'this is detail of the customer \n and this is ok',
            'balance' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('suppliers')->insert([
            'name' => 'supplier4',
            'mobile' => '9876589324',
            'address' => 'New Baneshwor, Kathmandu',
            'details' => 'this is detail of the customer \n and this is ok',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
