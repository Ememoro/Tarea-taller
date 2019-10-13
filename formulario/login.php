<?php
	
	$alert = '';

	if(!empty($_POST))
	{
		if(empty($_POST['usuario']) && empty($_POST['clave']))
		{
			$alert = 'Ingrese usuario y contraseña';
		}else{

			require_once "conexion.php";

			$user = mysqli_real_escape_string($con, $_POST['usuario']);
			$pass = md5(mysqli_real_escape_string($con, $_POST['clave']));

			
			$query = mysqli_query($con, "SELECT * FROM empleado where usuario= '$user' AND clave= '$pass'");
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);

				session_start();

				$_SESSION['active'] = true;
				$_SESSION['idempleado'] = $data['id_empleado'];
				$_SESSION['name'] = $data['nombre'];
				$_SESSION['user'] = $data['usuario'];
				$_SESSION['pass'] = $data['clave'];
				$_SESSION['rol'] = $data['id_funcion'];

				header('location: ../formulario/index.php');
			}else{
					$alert = 'El usuario o clave son incorrectos';
				


			}

		}
	}
?>



<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title>LOGIN SISTEMA</title>
</head>
<body>
	<section id="container">

		<form action="" method="post">

			<h3> INICIAR SESIÓN </h3>

			<img src="img/login.png" alt="Login">
			<br>
			<br>
			<input type="text" name="usuario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<dir class='alert'><?php echo isset($alert) ? $alert : ''; ?></dir>
			<input type="submit" value="INGRESAR">
			<br>
			<br>
			<input type="submit" value="REGISTRARSE">
			
		</form>
		
	</section>
</body>
</html>