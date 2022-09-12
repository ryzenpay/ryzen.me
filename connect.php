<?php
$servername = "localhost";
$username = "ryzeuofr_bot";
$password = "thisisabot12345";

$db = "bufftrade";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}    echo "Connected successfully";
?>