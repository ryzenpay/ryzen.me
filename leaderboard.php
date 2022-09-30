<!DOCTYPE html>
<html lang="en-US">
<?php

$servername = "localhost";
$username = "readonly";
$password = "secret_password";
$db = "prices";

$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
?>

<head>
    <title>Ryzen.me inventory checker</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/flavicon.png" />
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">
<style>
body {
    background-image: url("images/Background.png");
}
</style>

<body>
    <div class="wp-site-blocks">
        <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img
                loading="lazy" src="images/ryzen_calligraphy.png" alt="" class="wp-image-25" width="302" height="131"
                srcset="images/ryzen_calligraphy.png 302w, images/ryzen_calligraphy.png 300w"
                sizes="(max-width: 302px) 100vw, 302px"></figure>
    </div>
    <br>
    <a href="index.php"><button type="button" class="minibutton">Home</button></a>
    <a href="social.php"><button type="button" class="minibutton">Socials</button></a>
    <a href="inventory.php"><button type="button" class="minibutton">Inventory price check</button></a>
    <a href="search.php"><button type="button" class="minibutton">Buff database search</button></a>
    <a href="leaderboard.php"><button type="button" class="minibutton">Inventory leaderboard</button></a>
    <br>
    <hr class="line"> <br>
    <p>Current inventory price leaderboard:</p>
    <hr class="line"> <br>

</html>