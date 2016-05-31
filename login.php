<?php
session_start();
include 'cndb.php';
$clave=$_POST[pass];
$usuario=$_POST[usuario];
$clavecif= md5("sifuncionanolotoques" .$clave. "loquequierasx2"); 
echo "Clave: " .$clave. "   Clave cifrada con clave privada: " .md5(clavecif);
  #     #  // Attempt insert query execution  #  
if(!empty($usuario) && !empty($clave)){
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$clavecif'";
$query = mysqli_query($link, $sql);
$rows = mysqli_num_rows($query);
if($rows == 1){
echo "Te has logueado correctamente."; 
$_SESSION['usuario']=$usuario;
echo $_SESSION['usuario'];
$row=mysqli_fetch_row($query);
echo "Tu clave de streaming es rtmp://vps159360.ovh.net/live?cs=" .$row[5];
 }
else{
echo "ERROR: intentalo de nuevo $sql. " . mysqli_error($link);
}
}
    else{ echo "Inclumple alguno de los requisitos";}
mysqli_close($link);

?>
