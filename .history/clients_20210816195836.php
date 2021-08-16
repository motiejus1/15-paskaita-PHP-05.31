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