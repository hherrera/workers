<?php



 /**
     * Some constants for positioning the string
     */
    const POSITION_BOTTOM_RIGHT  = 0;
    const POSITION_BOTTOM_LEFT   = 1;
    const POSITION_BOTTOM_CENTER = 2;
    const POSITION_TOP_RIGHT     = 3;
    const POSITION_TOP_LEFT      = 4;
    const POSITION_TOP_CENTER    = 5;
    const POSITION_CENTER        = 6;



$image = new Imagick();
$image->readImage("img100.jpg");
 
$watermark = new Imagick();
$watermark->readImage("logo-ays.png");
 
// how big are the images?
$iWidth = $image->getImageWidth();
$iHeight = $image->getImageHeight();
$wWidth = $watermark->getImageWidth();
$wHeight = $watermark->getImageHeight();
 
if ($iHeight < $wHeight || $iWidth < $wWidth) {
    // resize the watermark
    $watermark->scaleImage($iWidth, $iHeight);
 
    // get new size
    $wWidth = $watermark->getImageWidth();
    $wHeight = $watermark->getImageHeight();
}
 
// calculate the position
$x = ($iWidth - $wWidth) / 2;
$y = ($iHeight - $wHeight) / 2;
 

 $offset = 5;
// bottomright
$x = ($iWidth  - $wWidth )/2;
$y= $iHeight - $wHeight - $offset;



$image->compositeImage($watermark, imagick::COMPOSITE_OVER, $x, $y);
 



$image->writeImage( 'result.jpg' );

$image->destroy();



?>




