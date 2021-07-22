<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'options_products')->withPivot('value', 'created_at');
    }
}
