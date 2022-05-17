<?php

namespace App\Traits;

trait HasCover
{
    public function uploadCover($request, $path, $name)
    {
        $cover = null;

        if($request->file($name)){
            $cover = $request->file($name);
            $cover->storeAs($path, $cover->hashName());
        }else{

        }
        return $cover;
    }
}
