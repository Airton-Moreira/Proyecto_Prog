<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
</head>
<body>
    <div id="postulantes">

    </div>
</body>
</html>
<script>
    let div_postulantes = document.getElementById("postulantes");
    let j = 4;

</script>
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

$postulantes_verde = [];
$postulantes_verde[0] = [2, "Jorge", "verde", "0", ""];

$largo_vot = 4;
//$largo_vot = len($votantes);
$i =1;


$id_pos = [];

if(!($votantes[$i][1]))
{
    for($l = 0; $l< $largo_vot; $l++)
    {
        if($votantes[$i][2] == $postulantes[$l][2])
        {
            
        }
    }
}
?>
