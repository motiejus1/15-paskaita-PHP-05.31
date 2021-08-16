<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
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
            <a href="register.php">Register here</><br>
            <button class="btn btn-primary" type="submit" name="submit">Log In</button>
        </form>
    </div>
</body>
</html>