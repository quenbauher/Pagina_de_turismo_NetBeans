<title>Documento sin título</title>
</head>

<body>


<?php

try{
	
	$login=htmlentities(addslashes($_POST["login"]));
	
	$password=htmlentities(addslashes($_POST["password"]));
	
        $contador=0;
        
	//$base=new PDO('mysql:host=localhost:3306;dbname=id3134687_itinerario', 'id3134687_root', ''); //conexion
         $base=new PDO('mysql:host=localhost;dbname=prueba', 'root', ''); //conexion

	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$sql="SELECT * FROM usuarios WHERE usuario= :usuario";//login aparese en la base de datos
	
	$resultado=$base->prepare($sql);	
		
	$resultado->execute(array(":usuario"=>$login));//aqui el primer login es el que aparese en la base de datos y el segundo el del formulario
		
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
			
		//	echo "Usuario: " . $registro['USUARIO'] . " Contraseña: " . $registro['PASSWORD'] . "<br>";			
		if(password_verify($password, $registro['password']))//el primer $password viene del formulario y el segundo el que viene cifrado de la base de datos
               //la funcion password_verify se encarga de comparar los dos datos que vienen y devuelve true si son correctas y false si no
                        {		
			$contador++;
		}
                
                }
		
                if($contador>0){
                    session_start();
                    $_SESSION["usuario"]=$_POST["login"];
                    header("location:../vista/adentrologin.php");
                   
                    //quede en video 60 de pildoras informaticas
                }
                
		else
                    
                {
                   
                    header("location:../vista/login.php");
                    
                }
		
		$resultado->closeCursor();

	
	
}catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
	
}




?>
</body>
</html>







<!-------------------------------------------------------------------------


<title>Documento sin título</title>
</head>

<body>

<  ? php
/*
try{
	
	$login=htmlentities(addslashes($_POST["login"]));
	
	$password=htmlentities(addslashes($_POST["password"]));
	
        $contador=0;
	
	$base=new PDO("mysql:host=localhost; dbname=prueba" , "root", "");
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$sql="SELECT * FROM usuarios WHERE usuario= :login";
	
	$resultado=$base->prepare($sql);	
		
	$resultado->execute(array(":login"=>$login));
		
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
			
		//	echo "Usuario: " . $registro['USUARIO'] . " Contraseña: " . $registro['PASSWORD'] . "<br>";			
		if(password_verify($password, $registro['password']))	{		
			$contador++;
		}
                
                }
		
                if($contador>0){
                    
                    echo 'Usuario registrado';
                }					
		else
                {
                    echo 'Usuario NO registrado';
                }
		
		$resultado->closeCursor();

	
	
}catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
	
}




?>
</body>
</html>