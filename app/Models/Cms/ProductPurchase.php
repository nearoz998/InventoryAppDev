<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductPurchase extends Model
{
    use HasFactory;
    protected $fillable=['purchase_id','product_id','quantity','price','sub_total',];
    
    // public function product(){
    //     return $this->hasOne('App\Models\Cms\Product','id','product_id');
    // }

    /**
     * Get the product associated with the ProductPurchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
