<?php

use App\Models\Cms\Product;

function productFromId($id)
{
  $product = Product::find($id);
  return $product->name;
}


?>