<?php
session_start();
include 'cndb.php';
if(isset($_SESSION['usuario'])) {
    $usuario=$_SESSION['usuario'];
    $sql= "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $query = mysqli_query($link, $sql);
    $row=mysqli_fetch_row($query);
    $id=$row[0];
    $pass=$row[2];
    $clavestream=$usuario.md5(uniqid($pass));
    $sql2 = "Update usuarios set clavestream='$clavestream' WHERE id='$id'"; 
        if(mysqli_query($link, $sql2)){
        echo "Clave de streaming cambiada: " .$clavestream;  
        }
        else{
        echo "ERROR: intentalo de nuevo $sql. " . mysqli_error($link);

        }
}
else {
    echo "No eres nadie";
?>