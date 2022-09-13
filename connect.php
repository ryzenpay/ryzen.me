<?php
$servername = "localhost";
$username = "ryzeuofr_bot";
$password = "thisisabot12345";

$db = "bufftrade";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}    echo "Connected successfully";
$trade = $_POST['trade'];
$payment = $_POST['payment'];
$payment_id = $_POST['payment_id'];
$skins = $_POST['item'];
$price = $_POST['price'];
$comm = $_POST['communication'];
$ogu = $_POST['ogu'];
$sql ="INSERT INTO Bufftrade (trade, payment, payment_id, item, price, communication, ogu) VALUES ('$trade','$payment','$payment_id','$skins','$price','$comm','$ogu')";
$rs = mysqli_query($con, $sql);
if($rs)
{
    echo "Contact records inserted";
}

?>