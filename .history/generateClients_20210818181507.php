<?php 

// Sugeneruos 200 klientu i duomenu baze

require_once("connection.php");

for ($i=0; $i<200; $i++) {
    $sql = "INSERT INTO `uzsiregistrave_vartotojai`(`vardas`, `slapyvardis`, `slaptazodis`, `teises_id`, `aprasymas`) 
    VALUES ('$name','$username','$password',1,'$description')";

    if(mysqli_query($conn, $sql)) {
        $class= "success";
        $message = "Vartotojas sukurtas sekmingai";
    } else {
        $message = "Kazkas ivyko negerai";
    }
}

//INSERT komanda i klientai lentele 200 kartu


?>