<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['id','name','designation','phone','email','rate_type','rate','blood_group','address1','address2','picture','country','zip_code',];
    /**
     * Get the designation associated with the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function designation(): HasOne
    {
        return $this->hasOne(Designation::class, 'id', 'designation_id');
    }
}
