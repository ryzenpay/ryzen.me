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
    <br>
    <hr class="line"> <br>
    <form name="steamidmenu" action="" method="get">
        <label for="steamid">Enter steam id:</label>
        <input type="text" id="steamid" name="steamid" class="input"
            value="<?php echo htmlspecialchars($_GET['steamid']); ?>">
        <?php
        echo '        <a href="inventory.php?steamid="'.$_GET["steamid"].'">
            <button class="minibutton">search</button>
        </a>'
            ?>
    </form>
    <form name="skins" onchange="">
        <?php
                $id = $_GET['steamid'];
                $items = 0;
                if (strlen($id) != 17){
        $id_url = "https://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key=74B813881CCD0CB19AC3FBBF096EBFA9&vanityurl=" . $id . "";
    $id_json = json_decode(file_get_contents($id_url));
    $id = $id_json->response->steamid;
                }
                $url = "http://steamcommunity.com/profiles/$id/inventory/json/730/2";
                $inventory = json_decode(file_get_contents($url));
echo '<label for="value">Inventory Value: </label>';
echo '<input type="text" id="value" name="value" value="0.0" class="hiddeninput" readonly>';
echo '<label for="value"> | for </label>';
echo '<input type="text" id="items" name="items" value="0" class="hiddeninput" readonly>';
echo '<label for="value">  Items</label>';
echo '<hr class="line"> <br>';
foreach ($inventory->rgDescriptions as $value => $v) {
                        $name = $v->market_hash_name;
                    $icon_url = $v->icon_url;
                    $sql = "select price from prices where name='".$name."'";
                    $result =  $conn->prepare($sql);
                    $result->bind_param("d", $price);
                    $result->execute();
                    $result->store_result();
                    $result->bind_result($price);
                    $result->fetch();
            echo '<img src = "http://steamcommunity-a.akamaihd.net/economy/image/'.$icon_url.'" class="icon" alt="'.$name.'">';
	                    echo '<label>'.$name.' | $'.$price."</label><br>";
                        $invval = $invval + $price;
                        $items = $items + 1;
    echo
        '<script type="text/javascript">
            document.getElementById("value").setAttribute("value","' . $invval . '");
            document.getElementById("items").setAttribute("value","'.$items.'")
        </script>';
        
}
echo '<p>Inventory value: '.$invval.'</p>';
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