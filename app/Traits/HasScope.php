<?php

namespace App\Traits;

trait HasScope
{
    /**
     * Boot the HasScope trait for a model.
     *
     * @return void
     */
    public function scopeSearch($query, $type)
    {
        return $query->when(request()->q, function($search) use($type){
            $search = $search->where($type, 'like', '%'.request()->q.'%');
        });
    }
}
