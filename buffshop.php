<!DOCTYPE html>
<html lang="en-US">
<?
require 'steamauth/steamauth.php';
require 'steamauth/userInfo.php';
ini_set("allow_url_fopen", 1);
$action = $_GET["action"];
if ($action = "check"){
    $tradelink = $_GET["tradelink"];
    if (strlen($tradelink) != 77){
        echo 'alert("Please input valid tradelink")';
        break;
    }
    else{
    $communication = $_GET["communication"];
    if ($communication == NULL){
        echo 'alert("Please input communication alias")';
    } else{
        $payment = $_GET["payment"];
        if ($payment == NULL){
            echo 'alert("Please input payment alias")';
        }
        else{
            for ($x = 0; $i < $x; $x++){
                
            }
        }
    }
    }
}
?>

<head>
    <title>Ryzen.me shop</title>
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
    <br>
    <a href="social.php">
        <button type="button" class="home">Home</button>
    </a>
    <a href="search.php">
        <button type="button" class="minibutton">Buff database search</button>
    </a>
    <a href="inventory.php">
        <button type="button" class="minibutton">Inventory price check</button>
    </a>
    <br>
    <hr class="line"> <br>
    <?php
    if(!isset($_SESSION['steamid'])) {
    echo '<p> Login with Steam to access the shop</p>';
    include ('steamauth/steamauth.php');
    loginbutton();
    } else {
    include ('steamauth/userInfo.php');
    echo '    <img class="img-rounded" src="<?= $steamprofile["avatar"]; ?>"> <b class="username">
        <?= $steamprofile["personaname"]; ?>';
        logoutbutton();
        ?>
        <br>
        <form name="details" onsubmit="" action="?action = check">
            <form name="tradelink" action="">
                <button onclick="tradelink()" title="Open in new tab" class="minibutton">Tradelink:
                </button>
                <input class="input" type="text" id="trade" name="trade"> <br>
            </form>
            <br>
            <form name="communication method" onchange="">
                <p>Select communication method: </p>
                <input type="radio" id="discord" name="discord" value="discord">
                <label for="discord">Discord</label> <br>
                <input type="radio" id="telegram" name="telegram" value="telegram">
                <label for="telegram">Telegram</label> <br>
                <label for="communication">Communication method Alias:</label> <br>
                <input type="text" id="communication" name="communication" class="input">

            </form>
            <br>
            <form name="payment method" onchange="">
                <p>Select Payment method:</p>
                <input type="radio" id="crypto" name="crypto" value="crypto">
                <label for="crypto">Crypto</label><br>
                <input type="radio" id="paypal" name="paypal" value="paypal">
                <label for="paypal">Paypal</label><br>
                <input type="radio" id="cashapp" name="cashapp" value="cashapp">
                <label for="cashapp">Cashapp</label><br>
                <label for="payment">Payment method address</label> <br>
                <input type="text" id="payment" name="payment" class="input">

            </form>
            <br>
            <form name="skins" onchange="">
                <?php
                $id = $_SESSION['steamid'];
                $url = "http://steamcommunity.com/profiles/$id/inventory/json/730/2";
                $inventory = json_decode(file_get_contents($url));
                $url2 = 'prices.json';
                $prices = json_decode(file_get_contents($url2), true);
                $i = 0;
                $value = 0.0;
                echo '<p>Inventory Value: $'.$value.'</p><br>';
                foreach ($inventory->rgDescriptions as $value => $v) {
                    $fprice = 'NULL';
                    $name = $v->market_hash_name;
                    $icon_url = $v->icon_url;
                    for ($x = 0; $x < count($prices); $x++) {
        if (isset($prices[$name]['buff163']['starting_at']['price'])) {
            $fprice = $prices[$name]['buff163']['starting_at']['price'];
            $value += ($fprice * 0.141279);
        }
                    }
                        if (isset($prices[$name]['buff163']['starting_at']['price'])){
                        $fprice = $prices[$name]['buff163']['starting_at']['price'];
                        $name = str_replace('StatTrak™', 'ST™', $name);
                        $name = str_replace('Factory New', 'FN', $name);
                        $name = str_replace('Minimal Wear', 'MW', $name);
                        $name = str_replace('Field-Tested', 'FT', $name);
                        $name = str_replace('Well-Worn', 'WW', $name);
                        $name = str_replace('Battle Scarred', 'BS', $name);
                        echo '<input type="checkbox" id="' . $i . '" name="' . $name . '" value="' . $i .' ">';
                        echo '<label for="' . $i . '"> '. $name . ' | $' . ($fprice * 0.141279) . '  </label>';
                        $i++;
                    }
                }
?>
                <br>
            </form>
            <input type="submit" value="check" class="minibutton"><br>
        </form>
        <hr class="line"> <br><br>
        <?php
        }
        ?>
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
<script>
function tradelink() {
    window.open('https://steamcommunity.com/my/tradeoffers/privacy', '_blank');
    alert("Opened in new tab");
}
</script>

</html>