<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Picture extends Model
{
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
