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

<div class="container">
        <h1>Registracija</h1>
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
                <label for="pavarde">Pavardė</label>
                <input class="form-control" type="text" name="pavarde" value=""/>
            </div>

            <?php if(isset($message)) { ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php } ?>

            <a href="login.php">Login here</a><br>
            <button class="btn btn-primary" type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>