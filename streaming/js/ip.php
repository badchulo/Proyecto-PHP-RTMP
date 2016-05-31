<?php
//Obtenemos la ip del visitante y la hora actual
$ip=$_SERVER['REMOTE_ADDR'];
$hora=time();
$existe=0;

//Tiempo que tarda en actualizarse el contador, en seg
$sesion=$hora-60;

$archivo="contar_ip.dat";
$ar=@file($archivo);

//Se abre el archivo de texto para eliminar las ips y crear un nuevo
// array con las vigentes
//Creamos un bucle para recorrer el archivo y leer su contenido 
foreach($ar as $pet) {
	$ele=explode(":",$pet);
	$ai=trim($ele[1]);

	if(trim($ele[1]) == $ip && trim($ele[0]) > $sesion) {
		$existe=1;
	}
	if(trim($ele[0]) > sesion) {
		$array[]=implode(":",$ele);
	}
}

//Se abre el archivo para guardar los datos nuevos
//Se crea un bucle para recorrer el archivo y leer su contenido
$p=@fopen($archivo, "w+");
if($existe == 0) {
	$array[]=$hora.":".$ip."n";
}

foreach($array as $eoeo) {
	$grabar.=trim($eoeo)."n";
}

@fwrite($p,$grabar);
@fclose($p);

$con=@file($archivo);

//Se guarda en una variable el numero de usuarios unicos visitando
// la web
$n_usuarios=count($con);

//Se muestran los datos formateados en color rojo
echo "<html>

<head>

<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1?>

</head>

<body style="color:green;">

<div align='left'>

$n_usuarios usuarios en línea

</div>

</body>

</html>";

?>
