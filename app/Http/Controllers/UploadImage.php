<?php namespace Elihans\Http\Controllers;

use Intervention\Image\Facades\Image;

class UploadImage {

    /***
     * THis processes an image and saves to the specified directory.
     * @param $image
     * @return string
     */
    public static function uploadImage($image, $directoryName, $width = 200, $height = 200)
    {
        $filename  = time() . '.'.$image->getClientOriginalName();
        $path = public_path($directoryName.'/' . $filename);

        $img = Image::make($image->getRealPath())->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        $img->save(str_replace('elihans/public/', "public_html/", $path));

        return $filename;
    }

}





