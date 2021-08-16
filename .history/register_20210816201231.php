<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
        <form action="register.php" method="get">


            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" />
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="form-group">
                <label for="repeat-password">Repeat Password</label>
                <input class="form-control" type="password" name="repeat-password" />
            </div>
            <a href="login.php">Login here</><br>
            <button class="btn btn-primary" type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>