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