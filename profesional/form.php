<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title> Formulario de Acceso </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Videojuegos & Desarrollo">
    <meta name="description" content="Muestra de un formulario de acceso en HTML y CSS">
    <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>
    <form action="login.php" method="POST">
        <div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <form id="loginform">
                        <input type="text" name="uname" placeholder="Usuario" required>

                        <input type="password" placeholder="Contraseña" name="pass" required>

                        <button type="submit" title="Ingresar" name="Ingresar" style="cursor: pointer;">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>

</html>