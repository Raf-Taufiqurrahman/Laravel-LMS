<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value) . '-' . Str::random(5);
    }
}
