<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            'designation' => 'HR',
            'details' => 'HR to recruit',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('designations')->insert([
            'designation' => 'Manager',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('designations')->insert([
            'designation' => 'Accountant',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('designations')->insert([
            'designation' => 'Driver',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
