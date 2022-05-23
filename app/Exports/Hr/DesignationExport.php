<?php

namespace App\Exports\Hr;

use App\Models\Hr\Designation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DesignationExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["id","designation","details",];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Designation::all();
        return Designation::select('id','designation','details',)->get();
    }
}
