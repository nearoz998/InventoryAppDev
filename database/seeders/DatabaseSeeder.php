<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([UsersTableSeeder::class]);
        $this->call([ProductUnitTableSeeder::class]);
        $this->call([ProductCategoryTableSeeder::class]);
        $this->call([SupplierTableSeeder::class]);
        $this->call([CustomerTableSeeder::class]);
        $this->call([ProductTableSeeder::class]);
        $this->call([DesignationTableSeeder::class]);
        $this->call([EmployeeTableSeeder::class]);
        $this->call([CountryTableSeeder::class]);
        $this->call([TaxTableSeeder::class]);
    }
}
