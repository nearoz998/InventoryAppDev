<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','name','weight','size','unit_id','category_id', 'supplier_id', 'service_rate', 'quantity', 'price','details','image'
    ];

    public function ProductCategory(){
        return $this->hasOne('App\Models\Cms\ProductCategory','id','category_id');
    }

    public function ProductUnit(){
        return $this->hasOne('App\Models\Cms\ProductUnit','id','unit_id');
    }

    public function images(){
        return $this->hasMany('App\Models\Cms\ProductImage','product_id','id');
    }

    public function Supplier(){
        return $this->hasMany('App\Models\Cms\Supplier','product_id','id');
    }
}
