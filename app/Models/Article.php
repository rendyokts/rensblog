<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $guarded = ['id'];

    public function Category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}