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
    <title>Ryzen.me inventory checker</title>
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
    <a href="social.php">
        <button type="button" class="home">Home</button>
    </a>
    <a href="buffshop.php">
        <button type="button" class="minibutton">Shop</button>
    </a>
    <a href="inventory.php">
        <button type="button" class="minibutton">Inventory price check</button>
    </a>
    <a href="search.php">
        <button type="button" class="minibutton">Buff datbase search</button>
    </a>
    <br>
    <hr class="line"> <br>
    <br>
    <form name="steamidmenu" action="" method="get">
        <label for="steamid">Enter steam id:</label>
        <input type="text" id="steamid" name="steamid" class="input"
            value="<?php echo htmlspecialchars($_GET['steamid']); ?>">
        <a target="_blank" href="https://www.steamidfinder.com/">
            <button type="button" class="minibutton">Stream ID finder</button>
        </a>
    </form>
    <form name="skins" onchange="">
        <?php
$value = (float)$value;
                $id = $_GET['steamid'];
                $url = "http://steamcommunity.com/profiles/$id/inventory/json/730/2";
                $inventory = json_decode(file_get_contents($url));
echo '<p>Inventory value: $' . $value . '</p>';
foreach ($inventory->rgDescriptions as $value => $v) {
                        $name = $v->market_hash_name;
                    $icon_url = $v->icon_url;
                    $sql = "select * from prices where name like '%". $name ."%'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc() ){
            echo '<img src = '.$icon_url.'>';
	                    echo '<label>'.$row["name"].' | $'.$row["price"]."</label><br>";
                        $value += (float)$row["price"];
                            }}
}
                ?>
    </form>
    <br>
    <hr class="line"> <br>
    <br>
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