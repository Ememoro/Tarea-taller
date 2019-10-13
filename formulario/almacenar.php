<?php


	//var_dump($_POST);

	if ($_POST) {
		//var_dump($_POST


	$id_paciente=$_POST['id_paciente'];
	$nombre=$_POST['nombre'];
	$pass=$_POST['pass'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];

	//var_dump($id_paciente);
	//var_dump($nombre);
	//var_dump($telefono);
	//var_dump($correo);

	$claseid = "";
	$clasenombre = "";
	$clasepass = "";
	$clasetelefono = "";
	$clasecorreo = "";

	if ($id_paciente == ""){
		$msgid = "Falta ingresar codifgo paciente";
		$claseid = "ERROR";
	} 
	if ($nombre == ""){
		$msgnombre = "Falta ingresar codifgo paciente";
		$clasenombre = "ERROR";
	}	
	if ($pass == ""){
		$msgpass = "Falta ingresar codifgo paciente";
		$clasepass = "ERROR";
	}		 
	if ($telefono == ""){
		$msgtelefono = 	"Falta ingresar codifgo paciente";
		$clasetelefono = "ERROR";
	}
	if ($correo == ""){
		$msgcorreo =     "Falta ingresar codifgo paciente";
		$clasecorreo = "ERROR";
	}	

	}

	
	$host="localhost";
	$user="root";
	$pass="";
	$db="tareaiacc";

	//conexion con los respectivos mensajes
	$con=mysqli_connect($host,$user,$pass,$db)or die("Problemas al conectar");
	mysqli_select_db($con,$db)or die("Problemas al conectarse a con la base de datos");


//VALIDACION FORMULARIO


	// recuperar las variables
	$id_paciente=$_POST['id_paciente'];
	$nombre=$_POST['nombre'];
	$pass=$_POST['pass'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];

	// sentencia sql
	$sql="INSERT INTO paciente VALUES('$id_paciente','$nombre', '$pass', '$telefono','$correo')";


	//se ejecuta la sentencia sql
	 $ejecutar=mysqli_query($con,$sql);
 //se verifica la ejecucion
 if(!$ejecutar){
  echo"Hubo Algun Error";
 }else{
  echo"Datos Guardados Correctamente<br><a href='index.php'>Volver</a>";
	}

?>