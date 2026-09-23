<?php
$votantes = [];
$postulante = [];
$votantes[0] = [1, false, "naranja", "45755741", "xqd4"];
$votantes[1] = [2, false, "verde", "45754741", "hi7l"];
$votantes[2] = [3, false, "azul", "45785741", "4567"];
$votantes[3] = [4, false, "violeta", "45155741", "1234"];

$postulantes[0] = [1, "Martin", "naranja", "0", ""];
$postulantes[1] = [2, "Jorge", "verde", "0", ""];
$postulantes[2] = [3, "Brayan", "azul", "0", ""];
$postulantes[3] = [4, "Jose", "violeta", "0", ""];
echo "aaaaaaaaaaaaaaaaa";
$largo_vot = 4;
$i =1;
$posibilidades = "A";

if(!($votantes[$i][1]))
{
    for($l = 0; $l< $largo_vot; $l++)
    {
        if($votantes[$i][2] == $postulantes[$l][2])
        {
            $aux_post = a_string($postulantes[$l][0]);
            $posibilidades =  $posibilidades . $aux_post . "_" ;
        }
    }
}

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
$posibilidades = $posibilidades . "A";
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

    <section class="postulantes">

        <div class="PostDiv">
            <h3 class="Cacique">Cacique 1</h3>
            <p id="Votos" class="Votos">0</p>
            <button id="Boton" class="BotonVotar">Votar</button>

            <h3 class="Cacique">Cacique 2</h3>
            <p id="Votos" class="Votos">0</p>
             <button id="Boton" class="BotonVotar">Votar</button>
        </div>

         <div class="PostDiv">
            <h3 class="Cacique">Cacique 1</h3>
            <p id="Votos" class="Votos">0</p>
            <button id="Boton" class="BotonVotar">Votar</button>

            <h3 class="Cacique">Cacique 2</h3>
            <p id="Votos" class="Votos">0</p>
             <button id="Boton" class="BotonVotar">Votar</button>
        </div>
        
    </section>



    <footer>

    </footer>
</body>
</html>
<script>
    let div_postulantes = document.getElementById("postulantes");
    var posibilidades = '<?php echo $posibilidades;?>';
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
            let postulante;
            postulante.innerHTML(" <");
        }
    }
    else
    {
        console.log(1);
    }

</script>

