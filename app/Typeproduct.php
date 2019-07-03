<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeproduct extends Model
{
    protected $fillable = [
        'name', 'description','image'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
