<?php 
	require_once('../modelo/usuario.php');
	require_once('../modelo/crud_usuario.php');
	require_once('../modelo/conexion.php');

	//inicio de sesion
	session_start();

	$usuario=new Usuario();
	$crud=new CrudUsuario();
	//verifica si la variable registrarse está definida
	//se da que está definicda cuando el usuario se loguea, ya que la envía en la petición
	if (isset($_POST['registrarse'])) {
		$usuario->setNombre($_POST['usuario']);
		$usuario->setClave($_POST['pas']);
		if ($crud->buscarUsuario($_POST['usuario'])) {
			$crud->insertar($usuario);
			header('Location: ../vista/indexlogin.php');
		}else{
			header('Location: ../vista/error.php?mensaje=El nombre de usuario ya existe');
		}		
		
	}elseif (isset($_POST['entrar'])) { //verifica si la variable entrar está definida
		$usuario=$crud->obtenerUsuario($_POST['usuario'],$_POST['pas']);
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getId()!=NULL) {
			$_SESSION['usuario']=$usuario; //si el usuario se encuentra, crea la sesión de usuario
			header('Location: ../vista/cuenta.php'); //envia a la página que simula la cuenta
		}else{
			header('Location: ../vista/error.php?mensaje=Tus nombre de usuario o clave son incorrectos'); // cuando los datos son incorrectos envia a la página de error
		}
	}elseif(isset($_POST['salir'])){ // cuando presiona el botòn salir
		header('Location: ../usuario/indexlogin.php');
		unset($_SESSION['usuario']); //destruye la sesión
	}
?>