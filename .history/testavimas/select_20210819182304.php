<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
</head>
<body>

    <form action="select.php" method="get">
        <select class="form-control" name="pasirinkimas">
            <option value="tuscias">Pasirinkti...</option>
            <option value="0">1 pasirinkimas</option>
            <option value="1">2 pasirinkimas</option>
            <option value="2">3 pasirinkimas</option>
            <option value="3" selected="selected">4 pasirinkimas</option>
            <option value="4">5 pasirinkimas</option>
            <option value="2">3 pasirinkimas</option>
            <option value="3">4 pasirinkimas</option>
            <option value="4">5 pasirinkimas</option>
        </select>
        <button type="submit" name="patvirtinti">Patvirtinti</button>
    </form>

    <?php 
    if(isset($_GET["patvirtinti"])) {
        $pasirinkimas = $_GET["pasirinkimas"];

        echo "Pasirinkto elemento reiksme ". $pasirinkimas;
    }
    
    ?>
</body>
</html>