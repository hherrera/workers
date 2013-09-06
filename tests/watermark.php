<?php

$image = new Imagick();

/**
 * Agregar marca de agua a imagen
 *
 * @author  Hernando Herrera Guerra <hherrera@araujoysegovia.com>
 * @date 2013-09-10
 */

class AddWatermark
{


 /**
 *  constantes acerca de la posición de la imagen de marca de agua
 */
    const POSITION_BOTTOM_RIGHT  = 0;
    const POSITION_BOTTOM_LEFT   = 1;
    const POSITION_BOTTOM_CENTER = 2;
    const POSITION_TOP_RIGHT     = 3;
    const POSITION_TOP_LEFT      = 4;
    const POSITION_TOP_CENTER    = 5;
    const POSITION_CENTER        = 6;


/**
     * @var array
     */
    protected $_options = array(
        'image'                     => new Imagick(),
        'watermark'                 => new Imagick(),
        'position'                  => self::POSITION_BOTTOM_RIGHT,
        'imagefile'                 => '',
        'watermarkfile'             => '',
        'imageWidthAndHeight'       => '',
        'watermarkWidthAndHeight'   => '',
        'sourcefile'                => '',
        
    );




    /** 
    *   
     * @param array $options
     */
    public function __construct( array $options )
    {
       

       
    }

/**
     * setear array Options
     *
     * @param int $position
     * @return AddWatermark
     */




/**
     * setear array Options
     *
     * @param array $options
     * @return AddWatermark
     */
    public function setOptions(array $options)
    {
        foreach ($options as $key => $value) {
            $normalized = ucfirst($key);

            $method = 'set' . $normalized;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }

        return $this;
    }


public function setPosition( $position){

        $this->_options['position'] = $position;

}



/** 
* establecer $_image
* @param imagick
*/

public function setImage($image)
{

    $this->_options['image'] = $image;


}

/** 
* establecer $_watermark
* @param imagick
*/

public function setWatermark($watermark)
{

    this->$_watermark = $watermark;


}


/** 
* establecer ancho alto image
* 
*/

public function setImageWidthAndHeight()
{

    this->$_imageWidthAndHeight = array($this->_image->getImageWidth(),$this->_image->getImageHeight());


}

/** 
* establecer ancho alto image
* 
*/

public function setWatermarkWidthAndHeight()
{

    this->$_watermarkWidthAndHeight = array($this->_watermark->getImageWidth(),$this->_watermark->getImageHeight());


}




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

}



?>




