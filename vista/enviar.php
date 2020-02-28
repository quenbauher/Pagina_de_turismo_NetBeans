<?php


// Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
 
//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)) 
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/xampp/htdocs/imag';
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    } 
    else 
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
} 
else 
{
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}
















/*________________________________________________________
// archivo temporal (ruta y nombre)
/*
$tmp_name = $_FILES["archivo"]["tmp_name"];

// Obtenemos los datos de la imagen tamaño, tipo y nombre

$tamano = $_FILES["archivo"]['size'];

$tipo = $_FILES["image/jpeg/png"]['type'];

$nombre = $_FILES["archivo"]["name"];

//ruta completa

$archivo_temporal = $_FILES['archivo']['tmp_name'];

//leer el archivo(imagen) temporal en binario

$fp = fopen($archivo_temporal, 'r+b');

$data = fread($fp, filesize($archivo_temporal));

ob_end_clean();

ob_start();

//mostramos la imagen en nuestro explorador para comprobar que se ha cargado correctamente

echo $data;

/* en nuestro caso subiremos imágenes jpeg, pero si queremos incluir tipos diferentes deberíamos usar 
la variable $tipo definida anteriormente y sustituirla por image/jpeg que aparece en la línea de abajo */
/*
header("Content-Type: image/jpeg");

header("Content-Disposition: inline; filename='imagen.jpg'");

header('Expires: 0');

header('Pragma: cache');

header('Cache-Control: private');

ob_end_flush ();

//escapar los caracteres

$data = mysql_escape_string($data);

fclose($fp);

//insertamos el archive binario que hemos obtenido y lo guardamos en la base de datos Mysql

$sql = $conn->prepare("INSERT INTO archivos (archivo_id ,archivo) VALUES('$archivo_id','$data')");

$sql->execute();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

