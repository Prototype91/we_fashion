<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'ref', 'category_id'
    ];

    public $timestamps = false;

    public function scopeDiscount($query) {
        return $query->where('discount', true);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function picture(): HasOne
    {
        return $this->hasOne(Picture::class);
    }
}
