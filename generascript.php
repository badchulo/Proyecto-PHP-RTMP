<html> 
<body>
<?php  $old_path = getcwd();
chdir('/script/');
$output = shell_exec('./script.sh ' .$_POST["name"].' ' .$_POST["cont"]);
?>
<br><?php echo md5(uniqid($_POST["name"], true)); ?>
<br> <?php echo $output; ?>
  Nombre del fichero <?php echo $_POST["name"]; ?>
<br> Tu contenido: <?php echo $_POST["cont"]; ?>  </body> </html> 
