<?php
session_start();
require "datos.php";
$votante = buscar_votante_por_id($_SESSION["id"]);
$postulantes = postulantes_de_tribu($votante["tribu"]);

$votantes[0] = ["id" => 1, "voto" => false, "tribu" =>"naranja", "dni" =>"45755741", "codigo_estudiante" =>"xqd4"];
$votantes[1] = ["id" => 2, "voto" => false, "tribu" =>"verde", "dni" =>"45754741", "codigo_estudiante" =>"hi7l"];
$votantes[2] = ["id" => 3, "voto" => false, "tribu" =>"azul", "dni" =>"45785741", "codigo_estudiante" =>"4567"];
$votantes[3] = ["id" => 4, "voto" => false, "tribu" =>"violeta", "dni" =>"45155741", "codigo_estudiante" =>"1234"];

$postulantes[0] = ["id" => 1, "nombre" => "Martin", "tribu" => "naranja", "votos" => "0", "porcentaje" => ""];
$postulantes[1] = ["id" => 2, "nombre" => "Jorge", "tribu" => "verde", "votos" => "0", "porcentaje" => ""];
$postulantes[2] = ["id" => 3, "nombre" => "Brayan", "tribu" => "azul", "votos" => "0", "porcentaje" => ""];
$postulantes[3] = ["id" => 4, "nombre" => "Jose", "tribu" => "violeta", "votos" => "0", "porcentaje" => ""];
$largo_vot = 4;
$i =1;
$posibilidades = "A";
$votante = ["id" => 3, "voto" => false, "tribu" =>"azul", "dni" =>"45785741", "codigo_estudiante" =>"4567"];



function a_string($a)
{
    switch($a)
    {
        case 0:
            return "0";

        case 1:
            return "1";

        case 2:
            return "2";

        case 3:
            return "3";

        case 4:
            return "4";

        case 5:
            return "5";

        case 6:
            return "6";

        case 7:
            return "7";

        case 8:
            return "8";

        case 9:
            return "9";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Votaciones</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
   

    <!--Desconecte el script para que no se pueda ver la cantidad de votos--->
<script src=""></script>

    <footer>

    </footer>


    <?php
    if(!($votante["voto"]))
    {
        for($l = 0; $l< $largo_vot; $l++)
        {
            if($votante["tribu"] == $postulantes[$l]["tribu"])
            {
                $aux_post = a_string($postulantes[$l]["id"]);
                $posibilidades =  $posibilidades . $aux_post . "_" ;
            }
        }
        $posibilidades =  $posibilidades . "A";
        echo '
        <form action="registro_voto.php" method="POST">
        
        <main class="encabezado">
    <h1 class="Titulo">Votaciones Intertribus</h1>
    <p class="Desc">Solo un voto por persona</p>
    </main>

      <section class="Nota">
         <div class="NotaD">
            <h1 class="Atencion">Atencion</h1>
            <p class="Descripcion"> Solamente se puede votar a un solo partido. Pensa con cuidado y no votes solamente por votar. Una vez realizado el voto, no se puede cambiar</p>
         </div>
    </section>';
    switch($votante["tribu"])
    {
    case "naranja":
        echo '
    <section class="PostulanteNaranja" id="div_salud">

        <div class="PostDiv">

            <div class="card">
            <h3 class="Cacique">Postulante 1</h3>
            <span class="MTribu">T. Naranja</span>
            <p id="Votos" class="Votos"></p>
            </div>

            <input class="Radio" type="radio" name = "voto" value "1" required>

             <div class="card">
            <h3 class="Cacique">Postulante 2</h3>
            <span class="MTribu">T. Naranja</span>
            <p id="Votos" class="Votos"></p>
            </div>
            
            <input class="Radio" type="radio" name = "voto" value "2" required>
        </div>

         <div class="PostDiv">

           <div class="card">
            <h3 class="Cacique">Postulante 3</h3>
                 <span class="MTribu">T. Naranja</span>
            <p id="Votos" class="Votos"></p>
            </div>

            <input class="Radio" type="radio" name = "voto" value "3" required>

            <div class="card">
            <h3 class="Cacique">Postulante 4</h3>
                 <span class="MTribu">T. Naranja</span>
            <p id="Votos" class="Votos"></p>
            </div>

             <input class="Radio" type="radio" name = "voto" value "4" required>
        </div>
        
    </section>';
    break;

    case "azul":
        echo '
     <section class="PostulanteAzul" id="div_salud">

        <div class="PostDiv">

            <div class="card">
            <h3 class="Cacique">Postulante 1</h3>
            <span class="MTribu">T. Azul</span>
            <p id="Votos" class="Votos"></p>
            </div>

            <input class="Radio" type="radio" name = "voto" value "1" required>

             <div class="card">
            <h3 class="Cacique">Postulante 2</h3>
            <span class="MTribu">T. Azul</span>
            <p id="Votos" class="Votos"></p>
            </div>
            
            <input class="Radio" type="radio" name = "voto" value "2" required>
        </div>

         <div class="PostDiv">

           <div class="card">
            <h3 class="Cacique">Postulante 3</h3>
                 <span class="MTribu">T. Azul</span>
            <p id="Votos" class="Votos"></p>
            </div>

            <input class="Radio" type="radio" name = "voto" value "3" required>

            <div class="card">
            <h3 class="Cacique">Postulante 4</h3>
                 <span class="MTribu">T. Azul</span>
            <p id="Votos" class="Votos"></p>
            </div>

             <input class="Radio" type="radio" name = "voto" value "4" required>
        </div>
        
    </section>';
    break;

    case "verde":

        echo '
     <section class="PostulanteVerde" id="div_salud">

        <div class="PostDiv">

            <div class="card">
            <h3 class="Cacique">Postulante 1</h3>
            <span class="MTribu">T. Verde</span>
            <p id="Votos" class="Votos"></p name = "voto" value "1" required>
            </div>

            <input class="Radio" type="radio">

             <div class="card">
            <h3 class="Cacique">Postulante 2</h3>
            <span class="MTribu">T. Verde</span>
            <p id="Votos" class="Votos"></p>
            </div>

            <input class="Radio" type="radio" name = "voto" value "2" required>
        </div>

         <div class="PostDiv">

           <div class="card">
            <h3 class="Cacique">Postulante 3</h3>
                 <span class="MTribu">T. Verde</span>
            <p id="Votos" class="Votos"></p>
            </div>

            <input class="Radio" type="radio" name = "voto" value "3" required>

            <div class="card">
            <h3 class="Cacique">Postulante 4</h3>
                 <span class="MTribu">T.  Verde</span>
            <p id="Votos" class="Votos"></p>
            </div>

             <input class="Radio" type="radio" name = "voto" value "4" required>
        </div>
        
    </section>';
    break;

        case "violeta":
            echo '
     <section class="PostulanteVioleta" id="div_salud">

        <div class="PostDiv">

            <div class="card">
            <h3 class="Cacique">Postulante 1</h3>
            <span class="MTribu">T. Violeta</span>
            <p id="Votos" class="Votos"></p>
            </div>

            <input class="Radio" type="radio" name = "voto" value "1" required>

             <div class="card">
            <h3 class="Cacique">Postulante 2</h3>
            <span class="MTribu">T. Violeta</span>
            <p id="Votos" class="Votos"></p>
            </div>
            
           <input class="Radio" type="radio" name = "voto" value "2" required>
        </div>

         <div class="PostDiv">

           <div class="card">
            <h3 class="Cacique">Postulante 3</h3>
                 <span class="MTribu">T. Violeta</span>
            <p id="Votos" class="Votos"></p>
            </div>

           <input class="Radio" type="radio" name = "voto" value "3" required>

            <div class="card">
            <h3 class="Cacique">Postulante 4</h3>
                 <span class="MTribu">T. Violeta</span>
            <p id="Votos" class="Votos"></p>
            </div>

             <input class="Radio" type="radio" name = "voto" value "4" required>
        </div>
        
    </section>
        ';
        break;
    }
    echo '<button class="votar">votar</button>
    </form>';
    }
    else
    {
        
    }?>




    <footer>

    </footer>
</body>
</html>
