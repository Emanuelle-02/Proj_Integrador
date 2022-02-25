<?php
session_start();
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
// Cria conexão
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword);
// Checa conexão
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}
?>