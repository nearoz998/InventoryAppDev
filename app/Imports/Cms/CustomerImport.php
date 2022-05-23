<?php

namespace App\Imports\Cms;

use App\Models\Cms\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class CustomerImport implements ToModel, WithStartRow, WithCustomCsvSettings
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
        return new Customer([
            'id' =>  $row[0],
            'name'  =>  $row[1],
            'mobile'  =>  $row[2],
            'address'  =>  $row[3],
            'balance' => $row[4],
            // 'created_at'=>  $row[5],
            // 'updated_at'=>  $row[6],
        ]);
    }
}
