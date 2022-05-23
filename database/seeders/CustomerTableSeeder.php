<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'customer1',
            'mobile' => '9876589324',
            'address' => 'New Baneshwor, Kathmandu',
            'balance' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('customers')->insert([
            'name' => 'customer2',
            'mobile' => '9876589324',
            'address' => 'New Baneshwor, Kathmandu',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('customers')->insert([
            'name' => 'customer3',
            'mobile' => '9876589324',
            'address' => 'New Baneshwor, Kathmandu',
            'balance' => '10000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('customers')->insert([
            'name' => 'customer4',
            'mobile' => '9876589324',
            'address' => 'New Baneshwor, Kathmandu',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
