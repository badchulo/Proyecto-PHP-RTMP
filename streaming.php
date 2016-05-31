<?php
$link = mysqli_connect("localhost", "root", "BNddxc1O", "stream");
	if($link === false){	die("ERROR: Could not connect. " . mysqli_connect_error());}

// www.server.com/auth.php?cs=felix
//check if querystrings exist or not
if(empty($_GET['cs']))
   {
    //no querystrings or wrong syntax
    echo "wrong query input";
    header('HTTP/1.0 404 Not Found');
    exit(1);
   }

else
   {
    //querystring exist
    $clavestreaming = $_GET['cs'];
    
   }

$sql = "SELECT * FROM usuarios WHERE clavestream='$clavestreaming'";
$query = mysqli_query($link, $sql);
$rows = mysqli_num_rows($query);
if($rows == 1){
$row=mysqli_fetch_row($query);
$csalmacenada=$row[5];
$cont=$row[4]+1;
$id=$row[0];
}
else {
    header('HTTP/1.0 404 Not Found');
    exit(1);
}
//check pass and user string
if (strcmp($clavestreaming,$csalmacenada)==0)
      { 
	echo "Password and Username OK! " .$id. " y " .$cont;
    $sql = "Update usuarios set sactivo=1 WHERE id='$id'"; 
    if(mysqli_query($link, $sql)){
echo "Te has registrado correctamente.";  
 }
else{
echo "ERROR: intentalo de nuevo $sql. " . mysqli_error($link);
    
}

	}

else
      {
	echo "password or username wrong! ";
        }

?>
