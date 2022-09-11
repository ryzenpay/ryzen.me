<?php
$servername = "localhost";
$username = "bot";
$password = "thisisabot12345";

$db = "bufftrade";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$ID = $_POST['ID'];
$steam_ID = $_POST['STEAM_ID'];
$payment = $_POST['Payment'];
$item = $_POST['Item'];
$price = $_POST['Price'];
$comm = $_POST['Communication'];
$ogu = $_POST['OGU'];
?>
