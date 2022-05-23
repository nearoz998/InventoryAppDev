<?php

namespace App\Exports\Cms;

use App\Models\Cms\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PaidCustomerExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["id","name","mobile","address","balance",];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::all();
        return Customer::where('balance', '=', 0)->select("id","name","mobile","address","balance",)->get();
    }
}
