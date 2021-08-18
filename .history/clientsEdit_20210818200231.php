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

    $result = $conn->query($sql); 

    if($result->num_rows == 1) {

        $user_info = mysqli_fetch_array($result);
        
        $cookie_array = array(
            $user_info["ID"],
            $user_info["slapyvardis"],
            $user_info["vardas"],
            $user_info["teises_id"]
        );

        $cookie_array = implode("|", $cookie_array);
        setcookie("prisijungta", $cookie_array, time() + 3600, "/");

        header("Location: clients.php");
    } else {
        $message = "Neteisingi prisijungimo duomenys";
    }
}

?>

<div class="container">
        <h1>Vartotojo redagavimas</h1>
        <form action="clientsEdit.php" method="get">
            <div class="form-group">
                <label for="vardas">Vardas</label>
                <input class="form-control" type="text" name="vardas" value="" />
            </div>
            <div class="form-group">
                <label for="pavarde">Pavardė</label>
                <input class="form-control" type="text" name="pavarde" value=""/>
            </div>

            <div class="form-group">
                <label for="teises_id">Teisės</label>
                <input class="form-control" type="text" name="teises_id" value=""/>
            </div>

            <a href="clients.php">Back</a><br>
            <button class="btn btn-primary" type="submit" name="submit">Edit</button>
        </form>
    </div>
</body>
</html>