<?php

namespace App\Imports\Cms;

use App\Models\Cms\ProductUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ProductUnitImport implements ToModel, WithStartRow, WithCustomCsvSettings
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
        return new ProductUnit([
            // 'unit'          =>  $row[0],
            'id'            =>  $row[0],
            'unit'          =>  $row[1],
            'status'       =>  $row[2],
            // 'created_at'    =>  $row[2],
            // 'updated_at'    =>  $row[3],
        ]);
    }
}
