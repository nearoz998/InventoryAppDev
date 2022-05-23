<?php

namespace App\Imports\Cms;

use App\Models\Cms\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class InvoiceImport implements ToModel, WithStartRow, WithCustomCsvSettings
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
    return new Invoice([
      'id', '$customer_id', 'date', 'payment_type', 'product_id', 'quantity', 'price', 'discount', 'amount', 'sub_total', 'invoice_discount', 'total_discount', 'taxable_amount', 'tax', 'total_amount', 'previous', 'net_total', 'paid_amount', 'due_amount', 'change',
    ]);
  }
}
