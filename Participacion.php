<?php
session_start();
require "datos.php";
$fila = ["id" => 1, "voto" => false, "tribu" =>"naranja", "dni" =>"45755741", "codigo_estudiante" =>"xqd4"];
$votantes = buscar_votante_por_tribu($fila["tribu"]);
$si_voto = 0;
$no_voto = 0;
foreach ($votantes as $v)
{
    if($v["voto"])
    {
        $si_voto++;
    }
    else
    {
        $no_voto++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participacion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main>
    <h1>Participaciones</h1>
    <p class="Desc">Se muestran las estadisticas de las participaciones</p>
    </main>

    <section class="estadisticas-principales">

        <div class="habilitados">
        <h3>Total de votantes habilitados</h3>

        <p class="estadistica"><?php echo $si_voto + $no_voto;?></p>
        </div>
   

    
    <div class="emitidos">
        <h3>Total de votantes emitidos</h3>
        <p class="estadistica"><?php echo $si_voto;?></p>
    </div>

    
    <div class="pendientes">
        <h3>Total de votantes pendientess</h3>
        <p class="estadistica"><?php echo $no_voto;?></p>
    </div>


      <div class="participacion">
        <h3>Participacion Total</h3>
        <p class="estadistica"><?php echo $si_voto / ($si_voto + $no_voto);?></p>
    </div>

</section>


    <section class="postulantes">
    <h2>Resultados por postulante</h2>

    <div class="postulantes-lista">

        <article class="postulante">
            <div class="postulante-info">
                <span class="postulante-nombre">Postulante A</span>
                <span class="postulante-tribu">Tribu 1</span>
            </div>

            <div class="postulante-resultado">
                <span class="porcentaje">0%</span>

                <div class="barra">
                    <div class="barra-progreso" ></div>
                </div>
            </div>
        </article>

        <article class="postulante">
            <div class="postulante-info">
                <span class="postulante-nombre">Postulante B</span>
                <span class="postulante-tribu">Tribu 2</span>
            </div>

            <div class="postulante-resultado">
                <span class="porcentaje">0%</span>

                <div class="barra">
                    <div class="barra-progreso"></div>
                </div>
            </div>
        </article>

        <article class="postulante">
            <div class="postulante-info">
                <span class="postulante-nombre">Postulante C</span>
                <span class="postulante-tribu">Tribu 3</span>
            </div>

            <div class="postulante-resultado">
                <span class="porcentaje">0%</span>

                <div class="barra">
                    <div class="barra-progreso"></div>
                </div>
            </div>
        </article>

        <article class="postulante">
            <div class="postulante-info">
                <span class="postulante-nombre">Postulante D</span>
                <span class="postulante-tribu">Tribu 4</span>
            </div>

            <div class="postulante-resultado">
                <span class="porcentaje">0%</span>

                <div class="barra">
                    <div class="barra-progreso"></div>
                </div>
            </div>
        </article>

    </div>
</section>
    

</body>
</html>
