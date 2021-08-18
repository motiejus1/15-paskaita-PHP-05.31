<?php 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>

    <?php require_once("includes.php"); ?>

</head>
<body>
<?php 

if(!isset($_COOKIE["prisijungta"])) { 
    header("Location: index.php");    
} else {
    echo "Sveikas prisijunges";
    echo "<form action='clients.php' method ='get'>";
    echo "<button class='btn btn-primary' type='submit' name='logout'>Logout</button>";
    echo "</form>";
    if(isset($_GET["logout"])) {
        setcookie("prisijungta", "", time() - 3600, "/");
        header("Location: index.php");
    }
}    
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Vardas</th>
      <th scope="col">Pavardė</th>
      <th scope="col">Teisės</th>
      <th scope="col">Veiksmai</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $sql = "SELECT * FROM klientai"; //uzklausa. 418
    $result = $conn->query($sql); // uzklausos vykdymas

    while($clients = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $clients["ID"]."</td>";
        echo "<td>". $clients["vardas"]."</td>";
        echo "<td>". $clients["pavarde"]."</td>";
        echo "<td>". $clients["teises_id"]."</td>";
        echo "<td>";

        echo "<a href="#'>Trinti</a>";
        echo "</td>";
        echo "</tr>";
    }
    //Atvaizduoti visus klientus. I lentele

    ?>
  </tbody>
</table>

</body>
</html>