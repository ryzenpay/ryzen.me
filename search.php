<!DOCTYPE html>
<html lang="en-US">
<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "kobe";
$password = "dennis3200";
$db = "prices";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
?>

<head>
    <title>Ryzen.me buff search</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/flavicon.png" />
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">
<style>
body {
    background-image: url("images/shopbackground.png");
}
</style>

<body>
    <div class="wp-site-blocks">
        <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img
                loading="lazy" src="images/ryzen_calligraphy.png" alt="" class="wp-image-25" width="302" height="131"
                srcset="images/ryzen_calligraphy.png 302w, images/ryzen_calligraphy.png 300w"
                sizes="(max-width: 302px) 100vw, 302px"></figure>
    </div>
    <hr class="line"> <br>
    <a href="social.php">
        <button type="button" class="home">Home</button>
    </a>
    <a href="buffshop.php">
        <button type="button" class="minibutton">Shop</button>
    </a>
    <a href="inventory.php">
        <button type="button" class="minibutton">Inventory price check</button>
    </a>
    <br>
    <form name="Searchmenu" action="" method="get">
        <label for="searchbar">Buff search:</label>
        <input type="text" id="searchbar" name="searchbar" class="input"
            value="<?php echo htmlspecialchars($_GET['searchbar']); ?>">
    </form>
    <?php
echo '<p>Search results: </p>';
$inputarray = explode(' ',$_GET['searchbar']);
$sql = "select * from prices where name like '%". $inputarray[0] ."%'";
for ($int = 1; $int < count($inputarray); $int++){
    $sql .=" and name like '%".$inputarray[$int]."%'";
}

$result = $conn->query($sql);
if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo '<label>'.$row["name"].' | $'.$row["price"]."</label><br>";
}}
 else {
	echo "0 records";
}
    ?>

    <br>
    <hr class="line"> <br>
</body>


</html>