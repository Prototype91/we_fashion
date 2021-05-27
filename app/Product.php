<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'ref', 'category_id', 'published', 'discount', 'size'
    ];

    public function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = $value == '1' ? true : false;
    }

    public function setPublishedAttribute($value)
    {
        $this->attributes['published'] = $value == '1' ? true : false;
    }

    public function setCategoryIdAttribute($value) {
        $this->attributes['category_id'] = $value == 0 ? null : $value;
    }

    public $timestamps = false;

    public function scopeDiscount($query)
    {
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
