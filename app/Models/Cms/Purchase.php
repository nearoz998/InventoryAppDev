<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','supplier_id','date','invoice_no','details','payment_type', 'product_id', 'quantity', 'price','sub_total','total',
    ];

    public function products(){
        return $this->hasMany('App\Models\Cms\Product','id','product_id');
    }

    public function supplier(){
        return $this->hasOne('App\Models\Cms\Supplier','id','supplier_id');
    }
    
    public function product_purchases(){
        return $this->hasMany('App\Models\Cms\ProductPurchase',);
    }
}
