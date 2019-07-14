<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'date_order', 'total','note','options'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function bill_details()
    {
        return $this->hasMany(Bill_detail::class);
    }
}
