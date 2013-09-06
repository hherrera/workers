
<?php
// Incluimos La clase directorio.
require_once '../lib/directorio.php';
 
// Instanciamos la clase y le pasamos el directorio de exploracion.
$objDirectorio  = new Directorio('/var/www/workers/img');
 
// Cantidad de subdirectorios a explorar.
$objDirectorio->setProfundidadEscaneo(2);
 
// Configuramos los tipos de archivos que queremos ver.
$objDirectorio->addTiposArchivosListar('jpg');
$objDirectorio->addTiposArchivosListar('txt');
 
// Vamos a configurar solo para ver archivos.
$objDirectorio->setListarDirectorios(1);
$listado        = $objDirectorio->listar();



// iterar listado de direcctorios
foreach($listado as $key => $value) 
{

$files = new Directorio( $key);

$files->setProfundidadEscaneo(0);
$files->addTiposArchivosListar('jpg');
$filelist = $files->getNombresArchivos(); 

 unset($files);

 printf($key);

var_dump($filelist);

}




?>