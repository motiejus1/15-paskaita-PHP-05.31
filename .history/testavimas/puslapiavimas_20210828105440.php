<?php require_once("../connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puslapiavimas</title>
    <?php require_once("../incincludes.php"); ?>
</head>
<body>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Vardas</th>
        <th scope="col">Pavardė</th>
        <th scope="col">Teisės</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // Rodoma po 15 irasu kiekviename puslapyje
        $sql = "SELECT * FROM 
        klientai
        ORDER BY klientai.ID ASC
        LIMIT 0,15
        ";

        $result = $conn->query($sql); 
        while($clients = mysqli_fetch_array($result)) {
            echo "<tr>";
                echo "<td>". $clients["ID"]."</td>";
                echo "<td>". $clients["vardas"]."</td>";
                echo "<td>". $clients["pavarde"]."</td>";
                echo "<td>". $clients["teises_id"]."</td>";
            echo "</tr>";
        }
        
        ?>
    </tbody>
</table>
</body>
</html>