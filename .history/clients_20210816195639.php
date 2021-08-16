<?php 

if(!isset($_COOKIE["prisijungta"])) { 
    header("Location: index.php");    
} else {
    echo "Sveikas prisijunges";
    echo "<form>";
    echo "<button type='submit' name='logout'>"
    echo "</form>";
}    
    
?>