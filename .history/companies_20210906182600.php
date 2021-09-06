<?php 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>

    <?php require_once("includes.php"); ?>
</head>
<body>
    <div class="container">
        <?php require_once("includes/menu.php"); ?>

        <?php 
        //Prisijungimo tikrinima
        if(!isset($_COOKIE["prisijungta"])) { 
            header("Location: index.php");    
        } else {
            echo "Sveikas prisijunges";
            echo "<form action='clients.php' method ='get'>";
            echo "<button class='btn btn-primary' type='submit' name='logout'>Logout</button>";
            echo "</form>";
            if(isset($_GET["logout"])) {
                setcookie("prisijungta", "", time() - 3600, "/");
                header("Location: index.php");
            }
        }    
        ?>
        
        <?php 
        //Imoniu atvaizdavima
            $sql = "SELECT imones.ID, imones.pavadinimas, imones.aprasymas, imones_tipas.pavadinimas, imones_tipas.aprasymas FROM `imones` LEFT JOIN imones_tipas ON imones.tipas_ID = imones_tipas.ID WHERE 1"
        ?>
    </div>
</body>
</html>