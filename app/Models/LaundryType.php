<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryType extends Model
{
    protected $table = "laundry_types";
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function prices()
    {
        return $this->hasMany(LaundryPrice::class);
    }
      public function weightBill(){
        return $this->hasMany(WeightBillDetail::class);
    }

}
