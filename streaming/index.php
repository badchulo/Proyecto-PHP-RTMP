<!DOCTYPE HTML> 
<html lang="es">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Streaming</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/jwplayer/jwplayer.js'></script>
</head>
<body>
    <?php
echo "Holaaaaaa!!";
$link = mysqli_connect("localhost", "root", "BNddxc1O", "stream");
	if($link === false){	die("ERROR: Could not connect. " . mysqli_connect_error());}

if(empty($_GET['id']))
   {
   $cs="usuario";
   }

else {

        $id = $_GET['id'];    
        echo $id;
       $sql = "SELECT * FROM usuarios WHERE id='$id'";
       $query = mysqli_query($link, $sql);
       $rows = mysqli_num_rows($query);

    if($rows == 1){
        $row=mysqli_fetch_row($query);
        $cs=$row[5];
        $activo=$row[4];
        if($activo==0){
            echo "No esta activo";
            //header('HTTP/1.0 404 Not Found');
            //exit(1);
            }
        }
    else {
        //header('HTTP/1.0 404 Not Found');
        //exit(1);

        echo "ERROR: intentalo de nuevo $sql. " . mysqli_error($link);

        }
   } 
    

?>

    <!-- Navegador FIJO -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Servidor Streaming</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
          </ul>
            <ul class="nav navbar-nav">
            <li><a href="html/documentacion.html">Documentación</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
<div class="container theme-showcase" role="main">
        <!-- Streaming -->
        <div class="jwplayer clearfix">
     		<div id='player_1'></div>
       			<script type='text/javascript'>
			  jwplayer('player_1').setup({
			    width: "100%",
			    height: "100%",
			    stretching: "fill",
			    primary: "flash",
			    autostart: "true",
			    sources:
			 [
			 {file: "rtmp://vps159360.ovh.net/live/flv:"<?php echo $cs;?>".flv"}
			 ]
			  });
      			</script>
	   </div>
        <!-- FIN -->
        <!-- Quienes somos e imagenes -->
        <div class="container marketing">
          <div class="row">
            <div class="col-xs-6">
              <img class="img-circle" src="img/jose.JPG" width="240" height="240">
              <h2>José A. Carrillo</h2>
              <p>Allons-y!</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-xs-6">
              <img class="img-circle" src="img/Diego.jpg" width="240" height="240">
              <h2>Diego Maluenda</h2>
              <p>El cielo es el límite.</p>
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
        </div><!-- /.container marketing -->
	<!-- Contador -->
	<div class="col-xs-2">
		<blockquote>
			<iframe src="../conexiones.php" frameborder="0" framespacing="0" scrolling="no" border="0" > </iframe>
		</blockquote>
	</div>
    </div> <!-- /container -->
</body>

</html>
