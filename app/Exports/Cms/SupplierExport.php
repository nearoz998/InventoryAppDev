<?php

namespace App\Exports\Cms;

use App\Models\Cms\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SupplierExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["id","name","mobile","address","balance","details",];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Supplier::all();
        return Supplier::select("id","name","mobile","address","balance","details",)->get();
    }
}
