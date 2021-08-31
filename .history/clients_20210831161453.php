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
    <div class="container">
        <?php require_once("includes/menu.php"); ?>
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

<?php 

if(isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql = "DELETE FROM `klientai` WHERE ID = $id";
    if(mysqli_query($conn, $sql)) {
        $message = "Klientas sekmingai istrintas";
        $class="success";
    } else {
        $message = "Kazkas ivyko negerai";
        $class="danger";
    }
}

?>
<?php if(isset($message)) { ?>

    <div style="display:none" class="alert alert-<?php echo $class; ?>" role="alert">
        <?php echo $message; ?>
    </div>
    <script>
    $(function() {
        $( "div.alert" ).fadeIn( 500 ).delay( 1500 ).fadeOut( 400 );
    });
</script>
<?php } ?>

<?php if(isset($_GET["search"]) && !empty($_GET["search"])) { ?>
    <a class="btn btn-primary" href="clients.php"> Išvalyti paiešką</a>
<?php } ?>

<form action="clients.php" method="get">

<div class="form-group">
    <select class="form-control" name="rikiavimas_id">
        <option value="DESC"> Nuo didžiausio iki mažiausio</option>
        <option value="ASC"> Nuo mažiausio iki didžiausio</option>
    </select>
    <button class="btn btn-primary" name="rikiuoti" type="submit">Rikiuoti</button>
</div>

</form>     


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
    
    if(isset($_GET["rikiavimas_id"]) && !empty($_GET["rikiavimas_id"])) {
        $rikiavimas = $_GET["rikiavimas_id"];
    } else {
        $rikiavimas = "DESC";
    }


    $sql = "SELECT klientai.ID, klientai.vardas, klientai.pavarde, klientai_teises.pavadinimas FROM klientai 
    LEFT JOIN klientai_teises ON klientai_teises.reiksme = klientai.teises_id 
    WHERE 1 
    ORDER BY klientai.ID $rikiavimas";

    if(isset($_GET["search"]) && !empty($_GET["search"])) {
        $search = $_GET["search"];
        // $sql = "SELECT * FROM `klientai` 
        // WHERE `vardas` LIKE '%".$search."%' OR `pavarde` LIKE '%".$search."%' 
        // ORDER BY `ID` $rikiavimas";

        $sql = "SELECT klientai.ID, klientai.vardas, klientai.pavarde, klientai_teises.pavadinimas FROM klientai 
        LEFT JOIN klientai_teises ON klientai_teises.reiksme = klientai.teises_id 
        
        WHERE klientai.vardas LIKE '%".$search."%' OR klientai_teises.pavadinimas LIKE '%".$search."%'

        ORDER BY klientai.ID $rikiavimas";
    }

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
    //Atvaizduoti visus klientus. I lentele

    //Kiekviena is klientu triname pagal jo ID
    //ID perduoti per GET. Per nuoroda
    ?>
  </tbody>
</table>
    </div>
</body>
</html>