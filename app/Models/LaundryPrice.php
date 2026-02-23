<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryPrice extends Model
{
    protected $table = 'laundry_prices';

    protected $primaryKey = 'id';

    protected $fillable = ['weight_range_id', 'laundry_type_id', 'price'];

    public function weightRange()
    {
        return $this->belongsTo(WeightRange::class);
    }

    public function laundryType()
    {
        return $this->belongsTo(LaundryType::class);
    }
}
