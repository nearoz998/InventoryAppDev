<?php

namespace App\Imports\Cms;

// to make import controller use following code
// php artisan make:import Cms/ProductCategoryImport --model=Cms/ProductCategory

use App\Models\Cms\ProductCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ProductCategoryImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductCategory([
            // 'category'          =>  $row[0],
            'id'             =>  $row[0],
            'category'       =>  $row[1],
            'status'       =>  $row[2],
            // 'created_at'     =>  $row[2],
            // 'updated_at'     =>  $row[3],
        ]);
    }
}
