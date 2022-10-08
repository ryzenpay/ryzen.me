<!DOCTYPE html>
<html lang="en-US">
<?php
$searchbar = $_POST['searchbar'];

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
    <a href="index.php"><button type="button" class="headbutton">Home</button></a>
    <a href="social.php"><button type="button" class="headbutton">Socials</button></a>
    <a href="inventory.php"><button type="button" class="headbutton" style="background-color:purple">Inventory price
            check</button></a>
    <a href="search.php"><button type="button" class="headbutton">Buff database search</button></a>
    <a href="exchange.php"><button type="button" class="headbutton">Exchange</button></a>
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">
<style>
body {
    background-image: url("images/Background.png");
    overflow: overlay;
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
            echo '<input type="text" id="value" name="value" value="0.0" class="hiddeninput" size="1" readonly>';
            echo '<label for="value"> | for </label>';
            echo '<input type="text" id="items" name="items" value="0" class="hiddeninput" size="1" readonly>';
            echo '<label for="value"> Items</label> <br>';
            echo '<hr class="line"> <br>';
            echo '<table>';
            echo '<tr><th>Image</th><th>Name</th><th>price</th><th>TradeHold</th></tr>';
            foreach ($inventory->rgDescriptions as $value => $v) {
                $name = $v->market_hash_name;
                $icon_url = $v->icon_url;
                $sql = "select IFNULL( (select price from prices where name='".$name."') ,'0')";
                $result =  $conn->prepare($sql);
                $result->bind_param("d", $price);
                $result->execute();
                $name = str_replace('StatTrak™', 'ST™', $name);
                $name = str_replace('Factory New', 'FN', $name);
                $name = str_replace('Minimal Wear', 'MW', $name);
                $name = str_replace('Field-Tested', 'FT', $name);
                $name = str_replace('Well-Worn', 'WW', $name);
                $name = str_replace('Battle Scarred', 'BS', $name);
                $image =  '<img src = "http://steamcommunity-a.akamaihd.net/economy/image/'.$icon_url.'" class="icon" alt="'.$name.'">';
                if ($v->cache_expiration){
                    $hold = substr($v->cache_expiration,0,10);
                    echo '<tr><td>'.$image.'</td><td>'.$name.'</td><td>$'.$price.'</td><td>'.$hold.'</td></tr>';
                }
                else {
                echo '<tr><td>'.$image.'</td><td>'.$name.'</td><td>$'.$price.'</td><td>Tradeable</td></tr>';
                }
                $invval = $invval + $price;
                $items = $items + 1;
                echo
                    '<script type="text/javascript">
                    document.getElementById("value").setAttribute("value","' . $invval . '");
                    document.getElementById("value").setAttribute("size","' . strlen((string)$invval) . '");
                    document.getElementById("items").setAttribute("value","'.$items.'")
                    document.getElementById("items").setAttribute("size","' . strlen((string)$items) . '");
                    </script>';
        
            }
        echo '</table>';
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