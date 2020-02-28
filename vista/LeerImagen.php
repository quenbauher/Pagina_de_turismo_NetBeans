<?php

require_once('../modelo/usuario.php');
	require_once('../modelo/crud_usuario.php');
	require_once('../modelo/conexion.php');

	//inicio de sesion
	session_start();

/* en pasos anteriores deberíamos tener una conexión abierta a nuestra base de 
datos para ejecutar nuestra sentencia SQL */
 
/* con la siguiente sentencia le asignamos a nuestro campo de la tabla ruta_imagen 
el nombre de nuestra imagen */
 
$sql = "UPDATE archivo SET ruta_imagen = '$nombre_img' ";
$result = mysql_query($sql);
 
/* volvemos a la página principal para cargar la imagen que hemos subido */
header("Location: cuenta.php");








/*--------------------------------------------
/* Realizamos una consulta sobre nuestra imagen almacenada, para ello usamos el parámetro archivo_id */
/*
$query = "select archivo, tipo_imagen from archivos where archivo_id=18";

$stmt = $conn->prepare($query);

$stmt->execute();

//Usamos bindColumn() que se encarga vincular una variable con el resultado de la consulta

/* Usamos el procedimiento PDO::PARAM_LOB, esto sirve para asignarle el tipo a la variable, nosotros usaremos el tipo PARAM_LOB para guardar binarios */
/*
$stmt->bindColumn(1, $data, PDO::PARAM_LOB);

/* FETCH_BOUND: devuelve TRUE y asigna los valores de las columnas definidas anteriormente con bindColumn*/
/*
$stmt->fetch(PDO::FETCH_BOUND);

//le decimos el tipo de la imagen para que se visualice y la mostramos

header("Content-Type: image/jpeg");

echo $data;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

