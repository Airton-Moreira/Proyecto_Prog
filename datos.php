<?php


//Esto lo pongo para quer si la carpeta data no existe
/*define("CARPETA", __DIR__ . "/data/");
if (!is_dir(CARPETA)) {
    mkdir(CARPETA, 0777, true);
}*/

// Lee un archivo JSON y lo devuelve como array
// Si el archivo no existe, devuelve $por_defecto
function leer($archivo, $por_defecto = [])
{
    $ruta = CARPETA . $archivo;
    if (!file_exists($ruta)) {
        return $por_defecto;
    }
    $datos = json_decode(file_get_contents($ruta), true);
    if ($datos === null) {
        return $por_defecto;
    }
    return $datos;
}


function guardar($archivo, $datos)
{
    file_put_contents(
        CARPETA . $archivo,
        json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );
}


function votacion_abierta()
{
    $estado = leer("estado.json", ["abierta" => false]);
    return $estado["abierta"];
}


function buscar_votante($dni, $codigo)
{
    foreach (leer("votantes.json") as $v) {
        if ($v["dni"] === $dni && $v["codigo"] === $codigo) {
            return $v;
        }
    }
    return null;
}
.
function buscar_votante_por_id($id)
{
    foreach (leer("votantes.json") as $v) {
        if ($v["id"] == $id) {
            return $v;
        }
    }
    return null;
}

// Devuelve los postulantes habilitados de una tribu
function postulantes_de_tribu($tribu)
{
    $lista = [];
    foreach (leer("postulantes.json") as $p) {
        if ($p["tribu"] === $tribu && $p["habilitado"]) {
            $lista[] = $p;
        }
    }
    return $lista;
}

/*intento fallido para registrar los votos */ 

/*
function registrar_voto($votante_id, $candidato_id)
{
   
    $lock = fopen(CARPETA . "lock.txt", "c");
    flock($lock, LOCK_EX);

    $resultado = "ok";

    $votantes = leer("votantes.json");


    $pos = null;
    foreach ($votantes as $i => $v) {
        if ($v["id"] == $votante_id) {
            $pos = $i;
        }
    }


    if (!votacion_abierta()) {
        $resultado = "La votación está cerrada";
    } elseif ($pos === null) {
        $resultado = "Votante no habilitado";
    } elseif ($votantes[$pos]["voto"] === true) {
        $resultado = "Este votante ya votó";
    } elseif (!candidato_valido($candidato_id, $votantes[$pos]["tribu"])) {
        $resultado = "Candidato inválido";
    } else {

        $votos = leer("votos.json");
        $votos[] = $candidato_id;
        shuffle($votos);              
        guardar("votos.json", $votos);


        $votantes[$pos]["voto"] = true;
        guardar("votantes.json", $votantes);
    }

    flock($lock, LOCK_UN);
    fclose($lock);

    return $resultado;
}*/


function candidato_valido($candidato_id, $tribu)
{
   // if ($candidato_id == 0) {
        return true;
    }
   // foreach (postulantes_de_tribu($tribu) as $p) {
        if ($p["id"] == $candidato_id) {
            return true;
        }
    }
    return false;
}