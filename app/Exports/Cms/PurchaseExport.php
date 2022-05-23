<?php

namespace App\Exports\Cms;

use App\Models\Cms\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PurchaseExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ['id','supplier_id','date','invoice_no','details','payment_type', 'product_id', 'quantity', 'price','sub_total','total',];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Purchase::all();
        return Purchase::select('id','supplier_id','date','invoice_no','details','payment_type', 'product_id', 'quantity', 'price','sub_total','total',)->get();
    }
}
