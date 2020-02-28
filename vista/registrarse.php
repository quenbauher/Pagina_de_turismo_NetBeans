<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
<header>
	<div class="w3-container w3-black">
		<h1>BIENVENIDO,,, AQUI TE PUEDES REGISTRAR OK....</h1>
	</div>
</header>
		<div class="w3-container w3-green">
			<h1>Registrarse</h1>
		</div>
		<div>
                    <form class="w3-container" action="../modelo/controller_login.php" method="post">
				<p>
					<label class="w3-label">Nombre de usuario o correo electrónico</label>
					<input class="w3-input w3-border" type="text" name="usuario">
				</p>
				<p>
					<label class="w3-label">Password</label>
					<input class="w3-input w3-border" type="password" name="pas">
				</p>
				<p>
					<input type="hidden" name="registrarse" value="registrarse">
					<button class="w3-btn w3-green">Registrarse</button>
				</p>
				<p><a href="indexlogin.php">Ahora no</a></p>
			</form>
		</div>
<footer>
	<div class="w3-container w3-black">
		<h4>ECODEUP 2017</h4>
	</div>
</footer>

</body>
</html>