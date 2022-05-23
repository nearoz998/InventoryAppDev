<?php

namespace App\Exports\Cms;

// to make export controller use following code
// php artisan make:export Cms/ProductCategoryExport --model=Cms/ProductCategory

use App\Models\Cms\ProductCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductCategoryExport implements FromCollection, WithCustomCsvSettings, WithHeadings, ShouldAutoSize
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        // return ['id,category,created_at,updated_at'];
        return ["id","category","status",];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return ProductCategory::all();
        return ProductCategory::select('id','category','status',)->get();
    }
}
