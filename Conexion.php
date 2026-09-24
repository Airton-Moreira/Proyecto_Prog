<?php
const SUPABASE_URL= "https://cxkdvyhcwyxarkfnzcnf.supabase.co";
const SUPABASE_SECRET_KEY = "sb_publishable_PINKpGA2NWidLJTte5oa2Q_GL5ZBkZ6";

function supabase($metodo, $ruta, $datos = null)
{
    $ch = curl_init(SUPABASE_URL . "/rest/v1/" . $ruta);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST  => $metodo,
        CURLOPT_HTTPHEADER     => [
            "apikey: " . SUPABASE_SECRET_KEY,
            "Authorization: Bearer " . SUPABASE_SECRET_KEY,
            "Content-Type: application/json",
        ],
    ]);
    if ($datos !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datos));
    }

    $respuesta = curl_exec($ch);
    $codigo    = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error     = curl_error($ch);
    curl_close($ch);

    if ($respuesta === false || $codigo >= 400) {
   
        error_log("Supabase error $codigo en $ruta: $error $respuesta");
        return null;
    }
    return json_decode($respuesta, true);
}

function votacion_abierta()
{
    $filas = supabase("GET", "eleccion?id=eq.1&select=estado");
    return ($filas[0]["estado"] ?? "") === "abierta";
}


function convertir_votante($fila)
{
    if ($fila === null) {
        return null;
    }
    return [
        "id"     => $fila["id_votante"],
        "dni"    => $fila["dni"],
        "codigo" => $fila["codigo"],
        "tribu"  => $fila["id_tribu"],
        "voto"   => $fila["ya_voto"] === true,
    ];
}

function buscar_votante($dni, $codigo)
{
    $filas = supabase(
        "GET",
        "votante?dni=eq." . urlencode($dni) . "&codigo=eq." . urlencode($codigo) . "&select=*"
    );
    return convertir_votante($filas[0] ?? null);
}

function buscar_votante_por_id($id)
{
    $filas = supabase("GET", "votante?id_votante=eq." . (int)$id . "&select=*");
    return convertir_votante($filas[0] ?? null);
}

function postulantes_de_tribu($tribu)
{
    $filas = supabase(
        "GET",
        "postulante?id_tribu=eq." . (int)$tribu . "&habilitado=eq.true&select=*&order=id_postulante"
    );

    $lista = [];
    foreach (($filas ?? []) as $p) {
        $lista[] = [
            "id"         => $p["id_postulante"],
            "nombre"     => $p["nombre"],
            "tribu"      => $p["id_tribu"],
            "habilitado" => true,
        ];
    }
    return $lista;
}

function registrar_voto($votante_id, $candidato_id)
{
    $resultado = supabase("POST", "rpc/registrar_voto", [
        "p_votante"   => (int)$votante_id,
        "p_postulante" => (int)$candidato_id,
    ]);

    if (!is_string($resultado)) {
        return "Error de conexión con la base de datos";
    }
    return $resultado;
}

function obtener_participacion()
{
    $filas = supabase("POST", "rpc/participacion", new stdClass());
    return $filas[0] ?? null;      
}

function obtener_resultados()
{
    return supabase("POST", "rpc/resultados", new stdClass()) ?? [];   
}
?>