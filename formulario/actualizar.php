<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
</head>
<body>

<?php

	$host="localhost";
	$user="root";
	$pass="";
	$db="tareaiacc";


	$con=mysqli_connect($host,$user,$pass,$db)
	or die("Problemas al conectar");


	$clave = $_POST['id_paciente'];
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];

	mysqli_query($con, "UPDATE paciente SET nombre='$nombre', telefono='$telefono', correo='$correo' where id_paciente ='$clave'")
	or die ("Error al actualizar los datos");


	$clavem = $_POST['id_medico'];
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$clavee = $_POST['id_especialidad'];

	mysqli_query($con, "UPDATE medico SET nombre='$nombre', telefono='$telefono', id_especialidad ='$clavee' where id_medico ='$clavem'")
	or die ("Error al actualizar los datos");



	$clavee = $_POST['id_especialidad'];
	$nombre = $_POST['nombre'];
	mysqli_query($con, "UPDATE especialidad SET nombre='$nombre' where id_especialidad ='$clavee'")
	or die ("Error al actualizar los datos");




	mysqli_close($con);
	echo "Datos actualizados corectamente<br><a href='index.php'>Volver</a>";
?>
</body>
</html>