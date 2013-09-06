<?php


require('./lib/gearmandAdmin.php');
 
//Create object from class sending host and port to connect on.
$gmAdmin = new gearmandAdmin( '127.0.0.1', 4730 );

echo $gmAdmin->getStatusRaw();
