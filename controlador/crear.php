<?php

include ("../modelo/interfazConect.php");


$nombre= $_POST['nombre'];
$apellido= $_REQUEST['apellido'];
$usuario= $_REQUEST['usuario'];
$pass1= $_REQUEST['pass1'];
$pass2= $_REQUEST['pass2'];


$interConexion = new interConexion(); 
$igual= $interConexion->verificar($pass1, $pass2); 

if($igual == true){
    
   
$interConexion->registrar($nombre, $apellido, $usuario, $pass1); 


}else if ($igual == false){
    
    echo "<h1> LAS CONTRASEÃ‘AS NO COINCIDEN</h1>";
    
}

 







?>