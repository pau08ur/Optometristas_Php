<?php
$serverDB = "localhost";
$userDB = "root";
$passDB = "";
$db = "optometristas";

$conexion = new mysqli($serverDB, $userDB, $passDB, $db);

if($conexion->connect_error)
{
    
 die ("La conexión ha fallado: " . $conexion->connect_error);

}

?>