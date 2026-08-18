<?php

namespace App\Http\Controllers;

use App\Library\Constant;
use Intervention\Image\Facades\Image;

class Intervention extends Controller
{
    /**
     * Resize image to 400px width
     *
     * @param $image
     * @param $name
     * @param int $width null default
     * @param null $height null default
     *
     * @return bool
     */
    public static function resizeImage($image, $width = null, $height = null)
    {
        $image = Image::make($image);

        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();

        });

        // Aplicar la calidad al resultado de encode
        $result     = $image->encode('jpg', 90); // Ajusta el formato y calidad según tus necesidades
        $image      = $result->stream()->__toString();

        return $image;
    }

    public static function getImageSize($image)
    {
        $result             =  Image::make($image);

        return [
            'width'     => $result->width(),
            'height'    => $result->height()
        ];
    }

    /**
     * Generate random image
     *
     * @return string
     */
    public static function generateRandomImage(){

        $images = Constant::IMAGES;
        $random = array_rand($images, 1);

        return $images[$random];
    }
}
