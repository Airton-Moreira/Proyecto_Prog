
<?php

session_start();
require "datos.php";
$voto = $_POST["voto"];
registrar_voto($_SESSION["id"], $voto);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voto Realizado.</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1 class="VTitulo">Voto realizado</h1>
        <p class="VDesc">Tu voto ha sido enviado. Gracias por participar!</p>
    </main>
    
    <section class="VBoton">
        <a href="login_votantes.html"><button class="Volver">Registro</button></a>
    </section>
</body>
</html>

