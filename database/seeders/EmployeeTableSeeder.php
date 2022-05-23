<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Ram Prasad Ghimire',
            'designation_id' => '4',
            'phone' => '9812341234',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('employees')->insert([
            'name' => 'Niraj Dhakal',
            'designation_id' => '4',
            'phone' => '9812341234',
            'email' => 'admin@test.com',
            'rate_type' => 'Monthly',
            'rate' => '30000',
            'blood_group' => 'A+',
            'address1' => 'Niraj Address 1',
            'address2' => 'Niraj Address 2',
            'country' => 'Nepal',
            'city' => 'Kathmandu',
            'zip_code' => '32500',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('employees')->insert([
            'name' => 'Pramod Thapa Magar',
            'designation_id' => '4',
            'phone' => '9812341234',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
