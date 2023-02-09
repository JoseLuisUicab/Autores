<?php
/*declaramos la variables para poder conectarnos la base de datos local */
$host="localhost";
$user="root";
$pass="";
$bd="maiaa";

$conectar=mysqli_connect($host,$user,$pass,$bd);// metodo para que se conecte a la base de datos 

if(!$conectar){/*verificamos si tuvimeos conexion ala base de datos en caso de n pues mandar un mensaje */
  echo "No se pudo conectar a la base de datos";
}else{
  //echo "conexion exitosa";
}

?>