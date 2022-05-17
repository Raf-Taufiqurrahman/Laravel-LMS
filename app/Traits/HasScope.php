<?php

namespace App\Traits;

trait HasScope
{
    public function scopeSearch($query, $type)
    {
        return $query->when(request()->q, function($search) use($type){
            $search = $search->where($type, 'like', '%'.request()->q.'%');
        });
    }

    public function scopeVerified($query)
    {
        return $query->where('status', 1);
    }
}
