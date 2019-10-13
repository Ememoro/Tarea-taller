<?php

	$host="localhost";
	$user="root";
	$pass="";
	$db="tareaiacc";

	//funcion llamada conexion 
	$con=mysqli_connect($host,$user,$pass,$db)or die("Problemas al conectar");
	mysqli_select_db($con,$db)or die("Problemas al conectarse a con la base de datos");


	// recuperar las variables
	$id_reserva=$_POST['id_reserva'];
	$id_paciente=$_POST['id_paciente'];
	$id_medico=$_POST['id_medico'];
	$id_especialidad=$_POST['id_especialidad'];
	$hora=$_POST['hora'];
	$fecha=$_POST['fecha'];
	
	// sentencia sql
	$sql="INSERT INTO reserva VALUES('$id_reserva','$id_paciente','$id_medico','$id_especialidad','$hora','$fecha')";

	//ejecutamos la sentencia de sql
	 $ejecutar=mysqli_query($con,$sql);
 //verificamos la ejecucion
 if(!$ejecutar){
  echo"Hubo Algun Error";
 }else{
  echo"Datos Guardados Correctamente<br><a href='index.html'>Volver</a>";
	}

?>