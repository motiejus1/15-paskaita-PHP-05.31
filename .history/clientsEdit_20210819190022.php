<?php 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Edit</title>

    <?php require_once("includes.php"); ?>
    
    <style>
        h1 {
            text-align: center;
        }

        .container {
            position:absolute;
            top:50%;
            left:50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .hide {
            display:none;
        }
    </style>

</head>
<body>
<?php 

//mes pagal ID turetume isvesti visus duomenis i input apie klienta
//ir naujus duomenis per UPDATE sukelti i duomenu baze

if(isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql = "SELECT * FROM klientai WHERE ID = $id";

    //kiek rezultatu gaunam? 1 

    $result = $conn->query($sql);//vykdome uzklausa 

    if($result->num_rows == 1) {
        //veiksmai
        $client = mysqli_fetch_array($result);
        $hideForm = false;
    
    } else {
        //ivyko kazkas blogai
        // header("clients.php");
        //header("error.php");
        //header("createClient.php");
        //galime paslepti forma
        $hideForm = true;
    }
}

if(isset($_GET["submit"])) {
    //Turime pasiimti visus kintamuosius
    //Kokia uzklausa atlikti? UPDATE
    if(isset($_GET["vardas"]) && isset($_GET["pavarde"]) && isset($_GET["teises_id"]) && !empty($_GET["vardas"]) && !empty($_GET["pavarde"]) && !empty($_GET["teises_id"])) {
        $id = $_GET["ID"];
        $vardas = $_GET["vardas"];
        $pavarde = $_GET["pavarde"];
        $teises_id = intval($_GET["teises_id"]);

        $sql = "UPDATE `klientai` SET `vardas`='$vardas',`pavarde`='$pavarde',`teises_id`=$teises_id WHERE ID = $id";

        if(mysqli_query($conn, $sql)) {
            $message =  "Vartotojas redaguotas sėkmingai";
            $class = "success";
        } else {
            $message =  "Kazkas ivyko negerai";
            $class = "danger";
        }
    } else {
        $id = $client["ID"];
        $vardas = $client["vardas"];
        $pavarde = $client["pavarde"];
        $teises_id = intval($client["teises_id"]);

        $sql = "UPDATE `klientai` SET `vardas`='$vardas',`pavarde`='$pavarde',`teises_id`=$teises_id WHERE ID = $id";
        if(mysqli_query($conn, $sql)) {
            $message =  "Vartotojas redaguotas sėkmingai";
            $class = "success";
        } else {
            $message =  "Kazkas ivyko negerai";
            $class = "danger";
        }
    }
}

?>

<div class="container">
        <h1>Vartotojo redagavimas</h1>
        <?php if($hideForm == false) { ?>
            <form action="clientsEdit.php" method="get">
                
                <input class="hide" type="text" name="ID" value ="<?php echo $client["ID"]; ?>" />

                <div class="form-group">
                    <label for="vardas">Vardas</label>
                    <input class="form-control" type="text" name="vardas" value="<?php echo $client["vardas"]; ?>" />
                </div>
                <div class="form-group">
                    <label for="pavarde">Pavardė</label>
                    <input class="form-control" type="text" name="pavarde" value="<?php echo $client["pavarde"]; ?>"/>
                </div>
                <?php 
                
                // 0 - Naujas klientas
                // 1 - Ilgalaikis klientas
                // 2 - Neaktyvus klientas
                // 3 - Nemokus klientas
                // 4 - Uzsienio(Ne EU) klientas
                // 5 - Uzsienio(EU) klientas
                ?>
                <div class="form-group">
                    <label for="teises_id">Teisės</label>
                    <!-- <input class="form-control" type="text" name="teises_id" value="<?php echo $client["teises_id"]; ?>"/> -->
                    <?php //echo $client["teises_id"];//0-5 
                    //6- Siaures Europos klientai
                    // 3 - kategorijos nebeliko
                    //1
                        // $select_array = array(
                        //     "",
                        //     "",
                        //     "",
                        //     "",
                        //     "",
                        //     ""
                        // );
                        // //1
                        // $select_array[$client["teises_id"]] = "selected='true'";

                    ?>


                    <select class="form-control" name="teises_id">
                        <?php 
                         $sql
                        ?>
                    </select>
                </div>

                <a href="clients.php">Back</a><br>
                <button class="btn btn-primary" type="submit" name="submit">Edit</button>
            </form>
            <?php if(isset($message)) { ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                <?php echo $message; ?>
                </div>
            <?php } ?>
        <?php } else { ?>
            <h2> Tokio kliento nėra </h2>
            <a href="clients.php">Back</a>
        <?php }?>    
    </div>
</body>
</html>