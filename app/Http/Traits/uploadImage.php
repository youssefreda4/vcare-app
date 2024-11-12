<?php

namespace App\Http\Traits;

trait uploadImage{
    public function upload($path){
        $image_name = request()->image->getClientOriginalName();
        $image_name = time() . rand(1, 100000) . '_' . $image_name;
        request()->image->move(public_path($path), $image_name);
        return $image_name;
    }

    public function delete($path, $name){
        unlink($path.$name);
    }
}