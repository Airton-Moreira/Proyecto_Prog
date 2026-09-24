<?php
require "Prueba_Datos.php";


guardar("votantes.json", [
    ["id" => 1, "dni" => "45755741", "codigo" => "xqd4", "tribu" => "naranja", "voto" => false],
    ["id" => 2, "dni" => "45754741", "codigo" => "hi7l", "tribu" => "verde",   "voto" => false],
    ["id" => 3, "dni" => "45785741", "codigo" => "4567", "tribu" => "azul",    "voto" => false],
    ["id" => 4, "dni" => "45155741", "codigo" => "1234", "tribu" => "violeta", "voto" => false],
]);


guardar("postulantes.json", [
    ["id" => 1, "nombre" => "Martin",  "tribu" => "naranja", "habilitado" => true],
    ["id" => 2, "nombre" => "Jorge",   "tribu" => "verde",   "habilitado" => true],
    ["id" => 3, "nombre" => "Brayan",  "tribu" => "azul",    "habilitado" => true],
    ["id" => 4, "nombre" => "Jose",    "tribu" => "violeta", "habilitado" => true],
    ["id" => 5, "nombre" => "Naranja 2", "tribu" => "naranja", "habilitado" => true],
    ["id" => 6, "nombre" => "Verde 2",   "tribu" => "verde",   "habilitado" => true],
    ["id" => 7, "nombre" => "Azul 2",    "tribu" => "azul",    "habilitado" => true],
    ["id" => 8, "nombre" => "Violeta 2", "tribu" => "violeta", "habilitado" => true],
]);

guardar("votos.json", []);
guardar("estado.json", ["abierta" => true]);   

echo "aaa funciona. <a href='index.php'>Ir a votar</a>";
