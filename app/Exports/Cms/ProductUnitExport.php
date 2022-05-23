<?php

namespace App\Exports\Cms;

use App\Models\Cms\ProductUnit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductUnitExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["id","unit","status",];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return ProductUnit::all();
        return ProductUnit::select('id','unit','status',)->get();
    }
}
