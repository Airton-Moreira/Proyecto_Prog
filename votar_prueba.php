<?php
session_start();
require "datos.php";

if (!isset($_SESSION["votante_id"])) {
    header("Location: index.php");
    exit;
}

$votante = buscar_votante_por_id($_SESSION["votante_id"]);

// cerre el voto
if ($votante === null || $votante["voto"] === true || !votacion_abierta()) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// solo para los caciques de la tribu
$candidatos = postulantes_de_tribu($votante["tribu"]);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Votaciones</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1 class="Titulo">Votaciones Intertribus</h1>
        <p class="Desc">Solo un voto por persona</p>
    </main>

     
    <section class="postulantes">
        <form action="registro_voto.php" method="POST"
              onsubmit="return confirm('Confirmar voto? Una vez votado, no se puede cambiar')">

            <?php foreach ($candidatos as $c): ?>
                <div class="PostDiv">
                    <label>
                        <input type="radio" name="candidato" value="<?= $c["id"] ?>" required>
                        <span class="Cacique"><?= htmlspecialchars($c["nombre"]) ?></span>
                    </label>
                </div>
            <?php endforeach; ?>

            <div class="PostDiv">
                <label>
                    <input type="radio" name="candidato" value="0" required>
                    <span class="Cacique">Voto en blanco</span>
                </label>
            </div>

            <button type="submit" class="BotonVotar">Confirmar voto</button>
        </form>
    </section>
    
</body>
</html>
