<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'gender'
    ];

    public $timestamps = false;
    
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
