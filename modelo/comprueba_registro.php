<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<?php




$usuario=$_POST["usu"];
$contrasenia=$_POST["pass"];

//$pass_cifrado = password_hash ($contrasenia, PASSWORD_DEFAULT, array("cost=>12"));

$pass_cifrado = password_hash ($contrasenia, PASSWORD_DEFAULT, array("cost"=>12));

try{
    
    
	//	$usuario=htmlentities(addslashes($_POST["usuario"]));//Almacenamos la variable login que viene del otro formulario
	
//	$contrasenia=htmlentities(addslashes($_POST["pass"]));
//	$contador=0;


 $base=new PDO('mysql:host=localhost;dbname=prueba', 'root', ''); //conexion
	
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Atributos de la conexion
	$base->exec("SET CHARACTER SET utf8");
        
        
      
	$sql="INSERT INTO usuarios (usuario, password) VALUES (:usuario, :pass)";
	
//	$sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :pass";//Consulta a la tabla
	
	$resultado=$base->prepare($sql);	
		
	//$resultado->execute(array(":pass"=>$contrasenia));
		
		$resultado->execute(array(":usuario"=>$usuario, ":pass"=>$pass_cifrado));
		
		//while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
			
			//echo "Usuario: " . $registro['USUARIOS'] . " Contraseña: " . $registro['PASSWORD'] . "<br>";			
		//		if(password_verify($contrasenia, $registro['PASS']))	{
					
			//		$contador++;
			
			echo "Registro insertado";
		//		}
			
	//	}
		
		//	if($contador>0) {
				
		//		echo "Usuario registrado"
				
	//		} else {
				
		//		echo "Usuario NO registrado";
//			}				
		
		
		$resultado->closeCursor();
        
	
	
}catch(Exception $e){
	
//	die("Error: " . $e->getMessage());

echo "Linea del error: " . $e->getLine();
	
	
	
}finally{
    
    $base=null;
}




?>
</body>
</html>