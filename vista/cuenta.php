<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: indexlogin.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tu cuenta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
	<div class="w3-container w3-black w3-center">
		<h1>BIENVENIDO A TUPAGINA PUEDES ADMINISTRAR TU PAGINA DESDE AQUI</h1>
	</div>
	<p></p>
        <?php    
  
	require_once('../modelo/conexion.php');

        /* lanzamos la consulta para traernos el nombre de la imagen, en nuestro caso 
el campo ruta_imagen se encuentra en la tabla usuarios */ 
$query2 = mysql_query("SELECT * FROM archivos "); 
$result=mysql_query($query2) or die(mysql_error());
while ($row=mysql_fetch_array($result)) 
{ 
    /*almacenamos el nombre de la ruta en la variable $ruta_img*/ 
    $ruta_img = $row["ruta_imagen"]; 
}
?>       
        
        <form action="enviar.php" enctype="multipart/form-data" method="post">
  <label for="imagen">Imagen:</label> 
  <input id="imagen" name="imagen" size="90" type="file" />
  <input type="submit" value="Cambiar datos" />
</form>
    
        
        
        <div>
   <img src="/intranet/uploads/<?php echo $ruta_img; ?>" alt="" />
</div>
        
        
        <form class="w3-container" action="indexlogin.php" method="post">
		<input type="hidden" name="salir" value="salir">
		<button class="w3-btn w3-green">Salir</button>
	</form>
</body>
</html>