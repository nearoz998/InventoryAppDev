<?php

namespace App\Exports\Cms;

use App\Models\Cms\Tax;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TaxExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["tax","status",];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Tax::all();
        return Tax::select('tax','status',)->get();
    }
}
