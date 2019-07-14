<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email','address','phone_number','note'
    ];
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
