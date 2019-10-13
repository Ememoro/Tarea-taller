<?php
$con = mysqli_connect('localhost','root','','tareaiacc');
$archivo = 'respaldoiacc.sql';
$guardar = fopen($archivo,"r+");
$contenido = fread($guardar,filesize($archivo));
$sql = explode(';',$contenido);
foreach($sql as $query){
  $resultado = mysqli_query($con,$query);
  if($resultado){
      echo '<tr><td><br></td></tr>';
      echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
      echo '<tr><td><br></td></tr>';
  }
}
fclose($guardar);
echo 'Base de Datos Restaurada con éxito';
?>