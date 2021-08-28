<?php require_once("../connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puslapiavimas</title>
</head>
<body>
    <?php 
    // Rodoma po 15 irasu kiekviename puslapyje
    $sql = "SELECT * FROM 
    klientai
    ORDER BY klientai.ID ASC
    LIMIT 0,15
    ";

$result = $conn->query($sql); // uzklausos vykdymas
// 0 - Naujas klientas
// 1 - Ilgalaikis klientas
// 2 - Neaktyvus klientas
// 3 - Nemokus klientas
// 4 - Uzsienio(Ne EU) klientas
// 5 - Uzsienio(EU) klientas
while($clients = mysqli_fetch_array($result)) {
    echo "<tr>";
        echo "<td>". $clients["ID"]."</td>";
        echo "<td>". $clients["vardas"]."</td>";
        echo "<td>". $clients["pavarde"]."</td>";
        echo "<td>". $clients["pavadinimas"]."</td>";
        echo "<td>";
            echo "<a href='clients.php?ID=".$clients["ID"]."'>Trinti</a><br>";
            echo "<a href='clientsEdit.php?ID=".$clients["ID"]."'>Redaguoti</a>";
        echo "</td>";
    echo "</tr>";
}
    
    
    
    ?>
</body>
</html>