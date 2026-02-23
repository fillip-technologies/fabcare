<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeightRange extends Model
{
    protected $table = "weight_ranges";
    protected $primaryKey = 'id';
    protected $fillable = ['min_kg','max_kg'];


    public function prices()
    {
        return $this->hasMany(LaundryPrice::class);
    }

      public function weightBill(){
        return $this->hasMany(WeightBillDetail::class);
    }
}
