<?php
include 'cndb.php';
  #     #  // Attempt insert query execution  #  
if(!empty($_POST[msg])){
    $msg=$_POST[msg];
    $sql = "INSERT INTO chat (mensaje) VALUES ('".$msg."')"; 
    if(mysqli_query($link, $sql)){
        echo "Enviado.";  
    }
    else{
        echo "ERROR: intentalo de nuevo $sql. " . mysqli_error($link);
    }
}
else {
    $sql2 = "SELECT * FROM chat";
    $query = mysqli_query($link, $sql2);
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        echo "Hay mensajes."; 
        $row=mysqli_fetch_array($query);
        while ($row = mysql_fetch_array($query)) {
            echo $row[5];
        }
    }
    else{
        echo "No hay mensajes";
    }
}


mysqli_close($link);

?>
