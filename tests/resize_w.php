<?php
$gmw = new GearmanWorker();
$gmw->addServer();
$gmw->addFunction("resize_image_percent", "resize_image");
while(1)
    $gmw->work();
 
function resize_image($job, $data=NULL)
{
    $time=date("mdYHis");
 
    /* get the name of the file to process */
    list($file, $percent) = unserialize($job->workload());
    $src= "$file";
    $dest= "$percent" . "_" . "$time.$file";
    /* create our imagmagick object */
    $img= new Imagick();
    $img->readImage($src);
    $width= round($img->getImageWidth() * ($percent/100));
    $img->thumbnailImage($width, 0);
    $img->writeImage($dest);
    echo "dest: $dest Resize cur: " . $img->getImageWidth() . " new: $width\n";
    $img->destroy();
 
    /* return the name of the resulting image */
    return serialize(array($dest, $percent));
}
?>