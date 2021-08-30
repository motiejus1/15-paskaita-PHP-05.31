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
echo "<br>";

// 0 - timestamp

//date(formatas, ?timestamp) - timestampa pavercia i reikiamo formato data
$formatas = "Y-m-d";
//Y - metai 2021
// m - menesis
// d - diena
$formated_date = date($formatas, $today[0]);

echo $formated_date;

$formated_date_1 = date("")

//Mygtuko paspaudimu yra pagaunama sios dienos data
//data yra irasoma i duomenu baze


?>    
</body>
</html>