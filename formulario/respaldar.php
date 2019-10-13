<?php

	$host="localhost";
	$user="root";
	$pass="";
	$db="tareaiacc";


	$con=mysqli_connect($host,$user,$pass,$db)
	or die("Problemas al conectar");

$tabla = array();
$resultado = mysqli_query($con,"SHOW TABLES");
while($fila = mysqli_fetch_row($resultado)){
  $tabla[] = $fila[0];
}
$directorio = '';
foreach($tabla as $tablas){
  $resultado = mysqli_query($con,"SELECT * FROM ".$tablas);
  $num_campos = mysqli_num_fields($resultado);
  
  $directorio .= 'DROP TABLE '.$tablas.';';
  $fila2 = mysqli_fetch_row(mysqli_query($con,"SHOW CREATE TABLE ".$tablas));
  $directorio .= "\n\n".$fila2[1].";\n\n";
  
  for($i=0;$i<$num_campos;$i++){
    while($fila = mysqli_fetch_row($resultado)){
      $directorio .= "INSERT INTO ".$tablas." VALUES(";
      for($j=0;$j<$num_campos;$j++){
        $fila[$j] = addslashes($fila[$j]);
        if(isset($fila[$j])){ $directorio .= '"'.$fila[$j].'"';}
        else{ $directorio .= '""';}
        if($j<$num_campos-1){ $directorio .= ',';}
      }
      $directorio .= ");\n";
    }
  }
  $directorio .= "\n\n\n";
}
//guardar archivo
$guardar = fopen("respaldoiacc.sql","w+");
fwrite($guardar,$directorio);
fclose($guardar);
echo "Respaldo realizado con éxito";

?>
