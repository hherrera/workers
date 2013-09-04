<?php
$worker= new GearmanWorker();
$worker->addServer();
$worker->addFunction("reverse", "my_reverse_function");
$worker->addFunction("resize", "my_resize_function");
while ($worker->work());
 
function my_reverse_function($job)
{
  return strrev($job->workload());
}
function my_resize_function($job)
{
  $thumb = new Imagick();
  $thumb->readImageBlob($job->workload());
 
  if ($thumb->getImageHeight() > 600)
    $thumb->scaleImage(0, 600);
  else if ($thumb->getImageWidth() > 800)
    $thumb->scaleImage(800, 0);
 
  return $thumb->getImageBlob();
}

?>
