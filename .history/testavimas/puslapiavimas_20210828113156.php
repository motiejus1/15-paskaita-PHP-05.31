<?php require_once("../connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puslapiavimas</title>
    <?php require_once("../includes.php"); ?>
</head>
<body>
    <div class="container">
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

    <?php 
        $sql = "SELECT CEILING(COUNT(ID)/15), COUNT(ID) FROM klientai";
        $result = $conn->query($sql);  
        //Kiek irasu grazina sita uzklausa?
        //1 irasas
        if($result->num_rows == 1) { 
            $clients_total_pages = mysqli_fetch_array($result);
            // var_dump($clients_total_pages);
            
            for($i = 1; $i <= intval($clients_total_pages[0]); $i++) {
                echo "<a href=''>";
                echo 
            }
            
            echo "<p>";
            echo "Is viso puslapiu: ";
            echo $clients_total_pages[0];
            echo "</p>";

            echo "<p>";
            echo "Is viso klientu: ";
             echo $clients_total_pages[1];
            echo "</p>";
        }
        else {
            echo "Nepavyko suskaiciuoti klientu";
        }
    ?>

</div>
</body>
</html>