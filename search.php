<!DOCTYPE html>
<html lang="en-US">
<?php

$search = $_POST['search'];

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
    <title>Ryzen.me buff search</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/flavicon.png" />
    <a href="index.php"><button type="button" class="headbutton">Home</button></a>
    <a href="social.php"><button type="button" class="headbutton">Socials</button></a>
    <a href="inventory.php"><button type="button" class="headbutton">Inventory price
            check</button></a>
    <a href="search.php"><button type="button" class="headbutton" style="background-color:purple">Buff database
            search</button></a>
    <a href="exchange.php"><button type="button" class="headbutton">Exchange</button></a>
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">
<style>
body {
    background-image: url("images/Background.png");
}

::-webkit-scrollbar {
    width: 5px;
}

::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.2)
}

::-webkit-scrollbar-thumb {
    background: #b651e0;
    border: 1px solid black;
    border-radius: 3px;
}
</style>

<body>
    <br>
    <div class="wp-site-blocks">
        <figure class="calligimage"><img loading="lazy" src="images/ryzen_calligraphy.png" alt="" class="wp-image-25"
                width="302" height="131" srcset="images/ryzen_calligraphy.png 302w, images/ryzen_calligraphy.png 300w"
                sizes="(max-width: 302px) 100vw, 302px"></figure>
    </div>
    <hr class="line"> <br>
    <form name="Searchmenu" action="" method="get">
        <?php
        $sql = "select count(*) from prices";
        $skins = $conn->query($sql);
        ?>
        <label for="skins">Skins in database:</label>
        <input type="number" id="skins" name="skins" class="hiddeninput" value="<?php echo $skins?>"> <br>
        <label for="searchbar">Buff search:</label>
        <input type="text" id="searchbar" name="searchbar" class="input"
            value="<?php echo htmlspecialchars($_GET['searchbar']); ?>">
        <label for="page">Page:</label>
        <input type="number" id="page" name="page" class="input" size="1"
            value="<?php echo htmlspecialchars($_GET['page']); ?>">
        <?php
        echo '        <a href="search.php?searchbar="'.$_GET["searchbar"].'"&page="'.$_GET["page"].'"">
            <button class="minibutton">search</button>
        </a>'
            ?>
    </form>
    <?php
echo '<p>Search results: </p>';
$inputarray = explode(' ',$_GET['searchbar']);
if ($_GET["page"] == null){
    $page = 100;
}
else {
    $page = $_GET["page"] * 100;
}
$sql = "select * from prices where name like '%". $inputarray[0] ."%'";
for ($int = 1; $int < count($inputarray); $int++){
    $sql .=" and name like '%".$inputarray[$int]."%'";
}
$sql .= " limit ".($page - 100). ",".$page."";

$result = $conn->query($sql);
if ($result->num_rows > 0){
    echo '<table>';
    echo '<tr><th>Name</th><th>price</th></tr>';
while($row = $result->fetch_assoc() ){
    $name = $row["name"];
    $name = str_replace('StatTrak™', 'ST™', $name);
    $name = str_replace('Factory New', 'FN', $name);
    $name = str_replace('Minimal Wear', 'MW', $name);
    $name = str_replace('Field-Tested', 'FT', $name);
    $name = str_replace('Well-Worn', 'WW', $name);
    $name = str_replace('Battle Scarred', 'BS', $name);
	echo '<tr><td>'.$name.'</td><td>$'.$row["price"]."</td></tr>";
}
echo '</table>';
}
 else {
	echo "0 records";
}
?>

    <br>
    <hr class="line"> <br>
    <address>
        <div class="footer">
            <p>By using our services you agree to our TOS</p>
            </footer>
    </address>
    <a href="TOS.php">
        <button title="TOS" class="tos">TOS</button>
    </a>
    <a href="privpos.php">
        <button title="privpos" class="privpos">Privacy Policy</button>
    </a>
</body>

</html>