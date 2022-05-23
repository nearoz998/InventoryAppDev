<?php

namespace App\Imports\Hr;

use App\Models\Hr\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class EmployeeImport implements ToModel, WithStartRow, WithCustomCsvSettings
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
        return new Employee(['id' => $row[0], 'name' => $row[1], 'designation' => $row[2], 'phone' => $row[3], 'email' => $row[4], 'rate_type' => $row[5], 'rate' => $row[6], 'blood_group' => $row[7], 'address1' => $row[8], 'address2' => $row[9], 'picture' => $row[10], 'country' => $row[11], 'zip_code' => $row[12],]);
    }
}
