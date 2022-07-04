<?php

$db_server = "Localhost";
$db_user = "root";
$db_pass = "";
$db_name = "food_delivery";

$connect = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if(!$connect){
    die("Could not connect to database".myslqi_error($connect));
}

?>