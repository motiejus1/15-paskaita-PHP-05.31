<?php 

// Sugeneruos 200 klientu i duomenu baze

require_once("connection.php");

for ($i=0; $i<200; $i++) {

    $vardas = "vardas".$i;
    $pavarde = "pavarde".$i;
    $teises_id = rand(0, 5);

    $sql = "INSERT INTO `klientai`(`vardas`, `pavarde`, `teises_id`) 
    VALUES ('$vardas','$pavarde','$teises_id')";

    if(mysqli_query($conn, $sql)) {
        echo "Vartotojas sukurtas sekmingai";
        echo "<br>";
    } else {
        echo "Kazkas ivyko negerai";
        echo "<br>";
    }
}

//INSERT komanda i klientai lentele 200 kartu


?>