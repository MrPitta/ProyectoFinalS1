<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ulaforo"; //Base de datos a conectar

$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
      die("No se pudo seleccionar la base de datos...".$conn->connect_error);
}
?>