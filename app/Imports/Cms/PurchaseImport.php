<?php

namespace App\Imports\Cms;

use App\Models\Cms\Purchase;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class PurchaseImport implements ToModel, WithStartRow, WithCustomCsvSettings
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
    return new Purchase([
      'id' => $row[0], 'supplier_id' => $row[1], 'date' => $row[2], 'invoice_no' => $row[3], 'details' => $row[4], 'payment_type' => $row[5], 'product_id' => $row[6], 'quantity' => $row[7], 'price' => $row[8], 'sub_total' => $row[9], 'total' => $row[10],
    ]);
  }
}
