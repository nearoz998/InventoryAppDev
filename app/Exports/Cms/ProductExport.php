<?php

namespace App\Exports\Cms;

use App\Models\Cms\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ['id','name','weight','size','unit_id','category_id', 'supplier_id', 'service_rate', 'quantity', 'price','details','image'];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Product::all();
        return Product::select('id','name','weight','size','unit_id','category_id', 'supplier_id', 'service_rate', 'quantity', 'price','details','image')->get();
    }
}
