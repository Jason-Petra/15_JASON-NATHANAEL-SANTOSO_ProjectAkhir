<?php

$host     = "localhost";
$user     = "root";
$password = "mysql"; 
$database = "elibrary";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_error()){
    echo("Maaf, terjadi kesalahan teknis pada server."); 
}

session_start();

?>