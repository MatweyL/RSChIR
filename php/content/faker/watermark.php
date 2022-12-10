<?php
function add_watermark($image)
{
    $image1 = $image;
    $image2 = 'images/watermark.png';
    list($width, $height) = getimagesize($image2);

    $image1 = imagecreatefromstring(file_get_contents($image1));
    $image2 = imagecreatefromstring(file_get_contents($image2));

//    imagealphablending($image2, false);
//    imagesavealpha($image2, true);
//    $alpha = round(127/255*127); // convert to [0-127]
//
//    for ($x = 0; $x < $width; $x++) {
//        for ($y = 0; $y < $height; $y++) {
//
//            // get current color (R, G, B)
//            $rgb = imagecolorat($image2, $x, $y);
//            $r = ($rgb >> 16) & 0xff;
//            $g = ($rgb >> 8) & 0xff;
//            $b = $rgb & 0xf;
//
//            // create new color
//            $col = imagecolorallocatealpha($image2, $r, $g, $b, $alpha);
//
//            // set pixel with new color
//            imagesetpixel($image2, $x, $y, $col);
//        }
//    }


    imagecopymerge($image1, $image2, 50, 50, 0, 0, $width, $height,30);
    imagepng($image1, $image);
}