<?php

namespace App\Utils;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class ImageUpload{

    public static function uploadImage($request,$height=null,$width=null,$path=null){//$path = مسار الملف /file path
        $imagename =Str::uuid().date('Y-m-d') . '.' . $request->extension();
        dd($imagename);
         [$widthDefault, $heightDefault] = getimagesize($request);
         $height = $height ?? $heightDefault; // if height null change it to heightdefault value
         $width = $width ?? $widthDefault;
        // $image = Image::make($request->path());
        // $image->fit($height, $width, function ($constraint) {
        //     $constraint->upsize();
        // })->stream();
        //  Storage::disk('public')->put($path.$imagename, $image);
         return 'public/'.$path.$imagename;
    }

}



