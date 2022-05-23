<?php

namespace App\Imports\Cms;

use App\Models\Cms\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ProductImport implements ToModel, WithStartRow, WithCustomCsvSettings
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
        return new Product([
            'id' =>  $row[0], 'name' =>  $row[1], 'weight' =>  $row[2], 'size' =>  $row[3], 'unit_id' =>  $row[4], 'category_id' =>  $row[5], 'supplier_id' =>  $row[6], 'service_rate' =>  $row[7], 'quantity' =>  $row[8], 'price' =>  $row[9], 'details' =>  $row[10], 'image' =>  $row[11],
        ]);
    }
}
