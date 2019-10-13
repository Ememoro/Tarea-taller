<?php
	
	//session_satrt();
	//$_SESSION['IDEMPLEADO'] = $fila['ID_EMPLEADO'];


	error_reporting(0);

	if ($_POST) {
		
	$id_paciente=$_POST['id_paciente'];
	$nombre=$_POST['nombre'];
	$pass=$_POST['pass'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];


	$claseid ="";
	$clasenombre ="";
	$clasepass ="";
	$clasetelefono ="";
	$clasecorreo ="";

	if ($id_paciente == "")
	{
		$msgid = "Falta ingresar codigo paciente";
		$claseid = "error";
	} 
	if ($nombre == "")
	{
		$msgnombre = "Falta ingresar nombre paciente";
		$clasenombre = "error";
	}	
	if ($pass == "")
	{
		$msgpass = "Falta ingresar contraseña paciente";
		$clasepass = "error";
	}	 
	if ($telefono == "")
	{
		$msgtelefono = 	"Falta ingresar telefono paciente";
		$clasetelefono = "error";
	}





	else{
		if (!is_numeric($telefono)) {
			$msgtelefono = 	"Este campo debe ser numerico";
			$clasetelefono = "error";
		}
	}

	if ($correo == ""){
		$msgcorreo =     "Falta ingresar mail paciente";
		$clasecorreo = "error";
	}	


 if ($claseid =="" && $clasenombre==""  && $clasepass==""  && $clasetelefono=="" && $clasecorreo=="")
  {
 
  echo "";
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

	$id_paciente=$_POST['id_paciente'];
	$nombre=$_POST['nombre'];
	$pass=$_POST['pass'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];

	// instruccion sql
	$sql="INSERT INTO paciente VALUES('$id_paciente','$nombre', '$pass', $telefono','$correo')";


	// METEDO LOGIN

	/*public function login(){

		model = new conexion;
		$con = model->conectar();
		$sql = "SEELCT * FROM empleado WHERE usuario=:usuario AND clave=:clave AND estado =1"
		$consulta = $con->prepare($sql);
		$consulta->mysqli_bind_param(':nombre', $this->nombre, PDO::PARAM_STR);
		$consulta->mysqli_bind_param(':clave', $this->clave, PDO::PARAM_STR);
		$consulta->execute();
		$total = consulta->rowConunt();

		if($total == 0){
			?>

			<script>
				location.href="login.php"
			</script>>

		<?php


		}else{

			$fecha = date("Y-m-d");
			$hora = date("H:i:s");

			$fila = $consulta->fetch();

			$slq2 = "INSERT INTO registro (ID_REGISTRO, ID_EMPLEADO, FECHAENTRADA, FECHASALIDA, HORAENTRADA, HORASALIDA, ESTADO) VALUES (null, '".$fila['ID_EMPLEADO']."', '$fecha', '$hora', '', '', 1)";
			$consulta2 = $con->prepare($sql2);
			$consulta2->execute();

			
			?>




			<?php

		}


	}

*/


	//se ejecuta la instancia sql
	 $ejecutar=mysqli_query($con,$sql);
 //se verifica
 if(!$ejecutar){
  echo"";
 }else{
  echo"Datos Guardados Correctamente<br><a href='index.php'>Volver</a>";
	}

?>


<!DOCTYPE HTML>
<html>

	<head>
	<meta charset="UTF-8">
		<title>SISTEMA</title>


		<style>

			
		div label
		{
				float: left;
				width: 15%;
		}
		input{
				border: solid 2px black;
			}

.error{
	background: silver;
	border: solid 4px red;
}

.msg{
	color: black;
	font-size: 10px;
}

		</style>

		</head>
	<body>
				
		<div style="text-align: right;width: 1400px">
			<p>SALIR<a href="../formulario/login.php"><img src="img/salir.png" align height="32" width="32"></a></p>

		</div>
		
		<div style="text-align: right;width: 1400px">
			<p>AYUDA<a href="../formulario/ayuda.html"><img src="img/ayuda.png" align height="32" width="32"></a></p>

		</div>

		<div style="text-align: right;width: 1400px">
			<p>VIDEO GUÍA<a href="../formulario/video.html"><img src="img/video.jpg" align height="32" width="32"></a></p>

		</div>
	
		<h1>FORMULARIOS SISTEMA AGENDA MEDICA</h1>
			<form action="almacenar.php" method="POST" name="form1">
				<fieldset>
				<legend>INGRESO PACIENTE</legend>
				
			

				<div class="<?php echo $claseid; ?>">
				<label FOR="id_paciente">ID Paciente</label>
				<input type="text" name="id_paciente" placeholder="Ingrese codigo" value="<?php echo $id_paciente;?>">
				<span class="msg"><?php echo $msgid;?></span>
				</div> 

				<br>
				<div class="<?php echo $clasenombre; ?>">
				<label FOR="nombre">Nombre</label>
				<input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?php echo $nombre;?>"> 
				<span class="msg"><?php echo $msgnombre;?></span>
				</div>
				<br>
				<div class="<?php echo $clasepass; ?>">
				<label FOR="pass">Contraseña</label>
				<input type="text" name="pass" placeholder="Ingrese su Contraseña" value="<?php echo $pass;?>"> 
				<span class="msg"><?php echo $msgpass;?></span>
				</div>
				<br>
				<div class="<?php echo $clasetelefono; ?>">
				<label FOR="telefono">Telefono</label>
				<input type="text" name="telefono" placeholder="Ingrese su numero" value="<?php echo $telefono;?>">
				<span class="msg"><?php echo $msgtelefono;?></span>
				</div>
				<br>
				<div class="<?php echo $clasecorreo; ?>">
				<label FOR="correo">Correo</label>
				<input type="text" name="correo" placeholder="Ingrese su e-mail" value="<?php echo $correo;?>">
				<span class="msg"><?php echo $msgcorreo;?></span>
				</div>
				<br>			
				<input type="submit" value="Grabar">
				</fieldset>
			</form>
			<br>

			<form action="borrar.php" method="POST">				
				ID: <input type="text" name="id_paciente">
				<input type="submit" value="Eliminar registro">
			</form>
			<br>

			<form action="actualizar.php" method="POST">				
				ID: <input type="text" name="id_paciente">
				Nombre: <input type="text" name="nombre">	
				Contraseña: <input type="text" name="pass">			
				Telefono: <input type="text" name="telefono">
				Correo: <input type="text" name="correo">				
				<input type="submit" value="Actualizar registro" name="btnActualizar">
			</form>
			<br>
			<p>____________________________________________________________________________________________________________________</p>
<h3>Crear respaldo y restauracion Sistema Agenda Horas Medicas</h3>

<a href="respaldar.php">Crear Respaldo</a>
<br>
<br>
<a href="restaurar.php">Restaurar Base de Datos</a>

			<p>____________________________________________________________________________________________________________________</p>



			<form action="medico.php" method="POST">
				<p>INGRESO MEDICO</p>
				<fieldset>
					<div>
				<label FOR="id_medico">ID Medico</label>
				<input type="text" name="id_medico" placeholder="" required> 
				<br>
				<br>
				<label FOR="nombre">Nombre</label>
				<input type="text" name="nombre" placeholder="Ingrese su nombre" required> 
				<br>
				<br>
				<label FOR="telefono">Telefono</label>
				<input type="text" name="telefono" placeholder="Ingrese su numero" required>
				<br>
				<br>
				<label FOR="id_especialidad">ID Especialidad</label>
				<input type="text" name="id_especialidad" placeholder="Ingrese id especialidad" required>
				</div>
				<br>
				<br>			
				<input type="submit" value="Grabar">
				</fieldset>
			</form>
			<br>
			<form action="borrar.php" method="POST">				
				ID: <input type="text" name="id_medico">
				<input type="submit" value="Eliminar registro">
			</form>
			<br>
			<form action="actualizar.php" method="POST">				
				ID: <input type="text" name="id_medico">
				Nombre: <input type="text" name="nombre">				
				Telefono: <input type="text" name="telefono">
				ID Esepcialidad: <input type="text" name="id_especialidad">				
				<input type="submit" value="Actualizar registro" name="btnActualizar">
			</form>
			<p>____________________________________________________________________________________________________________________</p>
			<form action="especialidad.php" method="POST">
				<p>INGRESO ESPECIALIDAD</p>
				<fieldset>
					<div>
				<label FOR="id_especialidad">ID especialidad</label>
				<input type="text" name="id_especialidad" placeholder="" required> 
				<br>
				<br>
				<label FOR="nombre">Nombre</label>
				<input type="text" name="nombre" placeholder="Ingrese su nombre" required>
				</div> 
				<br>
				<br>				
				<input type="submit" value="Grabar">
			</fieldset>
			</form>
			<br>
				<form action="borrar.php" method="POST">				
				ID: <input type="text" name="id_especialidad">
				<input type="submit" value="Eliminar registro">
			</form>
			<br>
			<form action="actualizar.php" method="POST">				
				ID: <input type="text" name="id_especialidad">
				Nombre: <input type="text" name="nombre">						
				<input type="submit" value="Actualizar registro" name="btnActualizar">
			</form>
			<p>____________________________________________________________________________________________________________________</p>
			</form>
			<form action="reserva.php" method="POST">
				<p>INGRESO RESERVA</p>
				<fieldset>
					<div>
				<label FOR="id_reserva">ID Reserva</label>
				<input type="text" name="id_reserva" placeholder="Ingrese ID" required> 
				<br>
				<br>
				<p>INGRESO PACIENTE</p>
				<label FOR="id_paciente">ID Paciente</label>
				<input type="text" name="id_paciente" placeholder="Ingrese ID" required> 
				<br>
				<br>
				<p>INGRESO MEDICO</p>
				<label FOR="id_medico">ID Medico</label>
				<input type="text" name="id_medico" placeholder="Ingrese ID" required> 
				<br>
			
				<p>INGRESO ESPECIALIDAD</p>
				<label FOR="id_especialidad">ID Especialidad</label>
				<input type="text" name="id_especialidad" placeholder="Ingrese ID" required> 
				<br>
				<br>
				<label FOR="hora">HORA</label>
				<input type="text" name="hora" placeholder="Ingrese la hora" required> 
				<br>
				<br>	
				<label FOR="fecha">FECHA</label>
				<input type="text" name="fecha" placeholder="Ingrese la fecha" required> 
				</div>
				<br>
				<br>			
				<input type="submit" value="Grabar">
				</fieldset>
			</form>
				<br>
				<form action="borrar.php" method="POST">				
				ID Reserva: <input type="text" name="id_paciente">
				<input type="submit" value="Eliminar registro">
			</form>
			<br>


			<form action="actualizar.php" method="POST">
				<br>
					<br>
						<br>	
						<fieldset>	
					<div>		
				<label>ID Reserva:</label>
				<input type="text" name="id_reserva">
				<br>
				<br>
				<label>ID Paciente:</label>
				<input type="text" name="id_paciente">
				<br>
				<br>			
				<label>ID Medico:</label>
				<input type="text" name="id_medico">
				<br>
				<br>
				<label>ID Especialidad:</label>
				<input type="text" name="id_especialidad">
				<br>
				<br>
				<label>Hora:</label>
				<input type="text" name="hora">
				<br>
				<br>
				<label>Fecha:</label>
				<input type="text" name="fecha">		
				</div>
				<br>
					<br>	

				<input type="submit" value="Actualizar registro" name="btnActualizar">
				</fieldset>
			</form>
			<p>____________________________________________________________________________________________________________________</p>
			</form>
		</div>
	</body>
</html>