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

?>

<div class="container">
        <h1>Vartotojo redagavimas</h1>
        <?php if($hideForm == false) { ?>
            <form action="clientsEdit.php" method="get">
                <div class="form-group">
                    <label for="vardas">Vardas</label>
                    <input class="form-control" type="text" name="vardas" value="<?php echo $client["vardas"]; ?>" />
                </div>
                <div class="form-group">
                    <label for="pavarde">Pavardė</label>
                    <input class="form-control" type="text" name="pavarde" value="<?php echo $client["pavarde"]; ?>"/>
                </div>

                <div class="form-group">
                    <label for="teises_id">Teisės</label>
                    <input class="form-control" type="text" name="teises_id" value="<?php echo $client["teises_id"]; ?>"/>
                </div>

                <a href="clients.php">Back</a><br>
                <button class="btn btn-primary" type="submit" name="submit">Edit</button>
            </form>
        <?php } else { ?>
        <?php }?>    
    </div>
</body>
</html>