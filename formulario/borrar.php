<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>Eliminar</title>
</head>
<body>

<?php

	$host="localhost";
	$user="root";
	$pass="";
	$db="tareaiacc";


	$con=mysqli_connect($host,$user,$pass,$db)
	or die("Problemas al conectar");

	

	$clavep = $_POST['id_paciente'];

	mysqli_query($con, "DELETE FROM paciente where id_paciente ='$clavep'")
	or die ("Error al elimnar los datos");

	$clavem = $_POST['id_medico'];

	mysqli_query($con, "DELETE FROM medico where id_medico ='$clavem'")
	or die ("Error al elimnar los datos");

	$clavee = $_POST['id_especialidad'];

	mysqli_query($con, "DELETE FROM especialidad where id_especialidad ='$clavee'")
	or die ("Error al elimnar los datos");


	$claver = $_POST['id_reserva'];

	mysqli_query($con, "DELETE FROM reserva where id_reserva ='$claver'")
	or die ("Error al elimnar los datos");





	mysqli_close($con);
	echo "Datos eliminados corectamente<a href='index.php'>Volver</a>";

?>


</body>
</html>