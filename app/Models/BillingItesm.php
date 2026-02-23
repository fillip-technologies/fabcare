<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingItesm extends Model
{
    protected $table = 'billing_items';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'itemsdata', 'gst', 'discount', 'paid_amount', 'due_amount','total_amount','invoice_number','laundry_number'];

    protected $casts = ['itemsdata' => 'array'];



    public function user(){
        return $this->belongsTo(User::class);
    }
}
