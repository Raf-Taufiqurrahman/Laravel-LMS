<?php

namespace App\Traits;

trait HasCover
{
    public function uploadCover($request)
    {
        $cover = null;

        if($request->file('cover')){
            $cover = $request->file('cover');
            $cover->storeAs('public/covers/', $cover->hashName());
        }else{

        }
        return $cover;
    }
}
