<?php

namespace App\Models;

use App\Traits\HasScope;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, HasScope, HasSlug;

    protected $fillable = ['name', 'slug', 'color'];

    // relationship with series
    public function series()
    {
        return $this->belongsToMany(Series::class);
    }
}
