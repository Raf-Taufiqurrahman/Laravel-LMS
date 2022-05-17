<?php

namespace App\Traits;

trait HasImage
{
    public function uploadImage($request, $path, $name)
    {
        $image = null;

        if($request->file($name)){
            $image = $request->file($name);
            $image->storeAs($path, $image->hashName());
        }else{

        }
        return $image;
    }
}
