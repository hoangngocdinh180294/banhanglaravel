<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $fillable = [
        'quantily', 'price',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
