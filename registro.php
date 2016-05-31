<?php
include 'cndb.php';
$clave=$_POST[pass];
$usuario=$_POST[usuario];
$clavecif= md5("sifuncionanolotoques" .$clave. "loquequierasx2"); 
$clavestream=$usuario.md5(uniqid($clavecif));
echo "Clave: " .$clave. "  Clave cifrada con clave privada: " .md5(clavecif);
$sql2 = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$query2 = mysqli_query($link, $sql2);
$rows = mysqli_num_rows($query2);
  #     #  // Attempt insert query execution  #  
if(!empty($usuario) && !empty($clave) && $rows==0){
$sql = "INSERT INTO usuarios (usuario, password, clavestream) VALUES ('".$usuario."', '".$clavecif."', '".$clavestream."')"; 
if(mysqli_query($link, $sql)){
echo "Te has registrado correctamente.";  
 }
else{
echo "ERROR: intentalo de nuevo $sql. " . mysqli_error($link);
    
}
}
    else{ echo "Inclumple alguno de los requisitos. ";if ($rows>0){echo "Ya existe este usuario";}}
mysqli_close($link);

?>
