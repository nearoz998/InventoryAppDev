<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=[
        "id","name","mobile","address","balance","details",
    ];
    use HasFactory;
}
