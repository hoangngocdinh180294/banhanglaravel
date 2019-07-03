<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description','unit_price','promotion_price','image','unit'
    ];
    public function typeproduct()
    {
        return $this->belongsTo(Typeproduct::class);
    }
    public function chitiethoadons()
    {
        return $this->hasMany(Chitiethoadon::class);
    }
    public function bill_details()
    {
        return $this->hasMany(Bill_detail::class);
    }
}
