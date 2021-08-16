<?php 
    require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    //Klientu valdymas + vartotoju valdymas

    //1. Prisijungimas naudojant duomenu baze
    // Lenteles su kazkokiais tai testiniais duomenimis
        if(isset($_GET["submit"])) {
            if(isset($_GET["username"]) && isset($_GET["password"]) && !empty($_GET["username"]) && !empty($_GET["password"])) {
                $username = $_GET["username"];
                $password = $_GET["password"];

                $sql = "SELECT * FROM `uzsiregistrave_vartotojai` WHERE slapyvardis='$username' AND slaptazodis='$password'"; //pasirinks visus duomenis kurie yra vartotoju lenteleje

                //Uzklausa grazins 1 rezultata
                //Jeigu neteisinga, sita uzklausa mums grazins 0/false

                $result = $conn->query($sql);

                if($result->num_rows == 1) {


                    //is gauto rezultato mes turetume pasiimti ID
                    //is gauto rezultato mes turetume pasiimti ID, slapyvardi, varda ir teises
                    //ir situos duomenis mes turetume isaugoti i COOKies.


                    header("Location: clients.php");
                } else {
                    $message = "Neteisingi prisijungimo duomenys";
                }
                // $result = mysqli_query($conn, $sql);

                var_dump($result);

                //mes turime i serveri nusiusti kazkokia tai uzklausa
                //ivykdyti/neivykdyti prisijungimo
                //ir uzdaryti prisijungima prie duomenu bazes

            } else {
                $message = "Laukeliai yra tušti arba duomenys yra neteisingi";
            }
        }    

    ?>
    <div class="container">
        <h1>Klientų valdymo sistema</h1>
        <form action="index.php" method="get">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" />
            </div>

            <button class="btn btn-primary" type="submit" name="submit">Log In</button>
        </form>

        <?php if(isset($message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>