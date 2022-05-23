<?php

namespace App\Exports\Hr;

use App\Models\Hr\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EmployeeExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ['id','name','designation','phone','email','rate_type','rate','blood_group','address1','address2','picture','country','zip_code',];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Employee::all();
        return Employee::select('id','name','designation','phone','email','rate_type','rate','blood_group','address1','address2','picture','country','zip_code',)->get();
    }
}
