<?php

session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
  header("location: add-info.php");
  exit;
}
include 'abrir.php';

//Meto los valores que nos ha dado en el campo de iniciar sesión.
$uname = $_POST['uname'];
$pass = $_POST['pass'];
echo $uname;
echo $pass;
//Verificamos si existe un usuario con ese nombre

$result = mysqli_query($conexion, "SELECT password,username FROM doctores WHERE username = '$uname' and password = '$pass'");


if($result->num_rows > 0) 
{

  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $uname;
  $_SESSION['start'] = time();

  header("location: add-info.php");
}
else {
    header("location:  form.php");
    echo "Username o password incorrectos";


}
mysqli_close($conexion);

?>