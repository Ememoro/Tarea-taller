<?php
	
	$host="localhost";
	$user="root";
	$pass="";
	$db="tareaiacc";

	//funcion llamada conexion 
	$con=mysqli_connect($host,$user,$pass,$db)or die("Problemas al conectar");
	mysqli_select_db($con,$db)or die("Problemas al conectarse a con la base de datos");


	// recuperar las variables
	$id_medico=$_POST['id_medico'];
	$nombre=$_POST['nombre'];
	$telefono=$_POST['telefono'];
	$id_especialidad=$_POST['id_especialidad'];

	// sentencia sql
	$sql="INSERT INTO medico VALUES('$id_medico','$nombre','$telefono','$id_especialidad')";

	//ejecutamos la sentencia de sql
	 $ejecutar=mysqli_query($con,$sql);
 //verificamos la ejecucion
 if(!$ejecutar){
  echo"Hubo Algun Error";
 }else{
  echo"Datos Guardados Correctamente<br><a href='index.html'>Volver</a>";
	}

?>