<?php
session_start();

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
$votante = ["voto" => true, "dni" => 45755441];



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
    <main>
    <h1 class="Titulo">Votaciones Intertribus!</h1>
    <p class="Desc">Solo un voto por persona</p>
    </main>
    <?php
    if(!($votantes[$i]["voto"]))
    {
        for($l = 0; $l< $largo_vot; $l++)
        {
            if($votantes[$i]["tribu"] == $postulantes[$l]["tribu"])
            {
                $aux_post = a_string($postulantes[$l]["id"]);
                $posibilidades =  $posibilidades . $aux_post . "_" ;
            }
        }
        $posibilidades =  $posibilidades . "A";
        echo '
    <section class="postulantes">
        <form action="registro_voto.php" method="POST">
            <h3 class="Cacique">Cacique 1</h3>
            <input type="radio" name="voto" required value="1"></input>

            <h3 class="Cacique">Cacique 2</h3>
            <input type="radio" name="voto" required value="2"></input>

            <h3 class="Cacique">Cacique 1</h3>
            <input type="radio" name="voto" required value="3"></input>

            <h3 class="Cacique">Cacique 2</h3>
            <input type="radio" name="voto" required value="4"></input>
            
            <button id="Boton" class="BotonVotar">Votar</button>
        </form>
    </section>
    <script>

 
        let div_post = document.getElementsByClassName("postulantes");
        let div_postulantes = div_post[0];
        var posibilidades = ' . $posibilidades . ';
        let postulantes = [];
        let sub_post = "";
        let aux_post = [];
        aux_post[0] = [1, "Martin", "naranja", "0", ""];
        aux_post[1] = [2, "Jorge", "verde", "0", ""];
        aux_post[2] = [3, "Brayan", "azul", "0", ""];
        aux_post[3] = [4, "Jose", "violeta", "0", ""];

        for (let i = 0; i < posibilidades.length; i++)
        {
            if(posibilidades[i] == "A")
            {
                continue;
            }
            aux = false;
            if(posibilidades[i] == "_")
            {
                aux = true;
            }
            else
            {
                aux = false;
            }
            if(aux)
            {
                console.log(sub_post);
                postulantes.push(sub_post);
                sub_post = "";
                continue;
            }
            else
            {
                sub_post = sub_post + "" + posibilidades[i];
                continue
            }
        }
        if(postulantes)
        {
            for(let i = 0; i < postulantes.length; i++)
            {
                let postulante_h3 = document.createElement("h3");
                postulante_h3.classList.add("Cacique");
                postulante_h3.textContent = "asda";
                let postulante_p = document.createElement("p");
                postulante_p.classList.add("BotonVotar");
                postulante_p.textContent = "as";
                let postulante_button = document.createElement("button");
                postulante_button.classList.add("BotonVotar");
                postulante_button.textContent = "asda";
                div_post.appendChild(postulante_h3);
            }
        }
        else
        {
            console.log(1);
        }

    </script>';
    }
    else
    {
        
    }
    ?>




    <footer>

    </footer>
</body>
</html>
