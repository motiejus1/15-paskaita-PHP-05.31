<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>

<form action="datos.php" method="get">
    <input type="text" name="username" placeholder="Enter your username">
    <button type="submit" name="submit">Submit</button> 
</form>

<?php

$today = getdate(); //masyvas - asociatyvus
var_dump($today);

echo $today["year"]."-".$today["mon"]."-".$today["mday"];

// 0 - timestamp

//date(formatas, timestamp) - timestampa pavercia i reikiamo formato data

$formated_date = date();


//Mygtuko paspaudimu yra pagaunama sios dienos data
//data yra irasoma i duomenu baze


?>    
</body>
</html>