<?php 

if(!isset($_COOKIE["prisijungta"])) { 
    header("Location: index.php");    
} else {
    echo "Sveikas prisijunges";
    echo "<form action=>";
    echo "<button class='btn btn-primary' type='submit' name='logout'>";
    echo "</form>";
}    
    
?>