<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "happymeal";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("failed to connect!");
}
?>