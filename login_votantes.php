
<?php
session_start();
$dni = $_POST["dni"];
$id = $_POST["id"];
$fila = 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        
        <?php
            if($dni == $fila )
            {
                $_SESSION == [$id];
                $_SESSION == [$dni];
            
                if($dni == 0 && $id == 0)
                {
                    header("location: http://localhost/Proyect_Prog/Proyecto_Prog/Participacion.php", true);
                }
                else{
                    
                header("location: http://localhost/Proyect_Prog/Proyecto_Prog/gestion_votante.php", true);

                }
            }
            else
            {
                header("location: http://localhost/Proyect_Prog/Proyecto_Prog/login_votantes.html", true);
            }
        ?>
        
    </nav>
</body>
</html>
