<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeightBillDetail extends Model
{
    protected $table = 'weight_bill_details';

    protected $fillable = ['user_id', 'weight_range_id', 'laundry_type_id', 'weight', 'rate', 'total', 'discount', 'paid', 'due','invoice_number','gst_percent','gst_amount','laundry_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function weightRange()
    {
        return $this->belongsTo(WeightRange::class);
    }

    public function laundryType()
    {
        return $this->belongsTo(LaundryType::class);
    }
}
