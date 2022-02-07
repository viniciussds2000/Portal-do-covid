<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "uni";
$conexao = mysqli_connect($hostname, $user, $password, $database);

if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
}
?>