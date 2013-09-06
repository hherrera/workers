<?php
$image="img01.jpg";
$gmc= new GearmanClient();
$gmc->addServer();
$gmc->setCompleteCallback("image_complete");
for($x=100; $x >= 1; $x-=1)
    $gmc->addTask("resize_image_percent", serialize(array($image, $x)));
$gmc->runTasks();
 
function image_complete($task)
{
    list($file, $percent)= unserialize($task->data());
    $msg="PERCENT: $percent JOB: " . $task->jobHandle() ;//. 
     //    " FUNC: " . $task->function() . "\n";
    $msg=$msg."$file\n";

    printf($msg);
}
?>