<!DOCTYPE html>
<html lang="en-US">
<?
require 'steamauth/steamauth.php';
require 'steamauth/userInfo.php';
ini_set("allow_url_fopen", 1);
?>

<head>
    <title>Ryzen.me shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="https://ryzen.me/images/flavicon.png" />
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">
<style>
body {
    background-image: url("https://ryzen.me/images/shopbackground.png");
}
</style>

<body>
    <div class="wp-site-blocks">
        <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img
                loading="lazy" src="https://ryzen.me/images/ryzen_calligraphy.png" alt="" class="wp-image-25"
                width="302" height="131"
                srcset="https://ryzen.me/images/ryzen_calligraphy.png 302w, https://ryzen.me/images/ryzen_calligraphy.png 300w"
                sizes="(max-width: 302px) 100vw, 302px"></figure>
    </div>
    <hr class="line"> <br>
    <a href="social.php">
        <button type="button" class="home">Home</button>
    </a>
    <? if (isset($_SESSION['steamid'])) { ?>
    <img class="img-rounded" src="<?= $steamprofile['avatar']; ?>"> <b class="username">
        <?= $steamprofile['personaname']; ?>
    </b><b class="caret"></b>
    <? echo logoutbutton(); ?>
    <br>
    <form name="details" onsubmit="paycheck()">
        <form name="tradelink" action="">
            <button onclick="tradelink()" title="Open in new tab" class="minibutton">TradeLink:
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
            <input type="text" id="communication" name="communication">

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
            <input type="text" id="payment" name="payment">

        </form>
        <br>
        <form name="skins" onchange="">
            <?php
                $id = $_SESSION['steamid'];
                $url = "http://steamcommunity.com/profiles/$id/inventory/json/730/2";
                $inventory = json_decode(file_get_contents($url));
                $url2 = 'http://prices.ryzen.me/prices.json';
                $prices = json_decode(file_get_contents($url2), true);
                $i = 0;
                foreach ($inventory->rgDescriptions as $value => $v) {
                    $fprice = 'NULL';
                    $name = $v->market_hash_name;
                    $icon_url = $v->icon_url;
                    for ($x = 0; $x < count($prices); $x++) {
                        $fprice = $prices[$name]['buff163']['starting_at']['price'];
                    }
                    if ($fprice != null) {
                        echo '<input type="checkbox" id="' . $i . '" name="' . $name . '" value="' . $i . '">';
                        echo '<label for="' . $i . '"> ' . $name . ' | $' . $fprice . '</label> <br>';
                    }
                    $i++;
                }
                ?>
            <br>
        </form>
        <input type="submit" value="check" class="minibutton"><br>
    </form>
    <hr class="line"> <br><br>
    <? } else { ?>
    <p> Login with Steam to access the shop</p>
    <? echo loginbutton(); ?>
    <br>
    <?
    } ?>
    </p>
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
function submit() {
    mysqli_query($con, $sql);
}

function tradelink() {
    window.open('https://steamcommunity.com/my/tradeoffers/privacy', '_blank');
    alert("Opened in new tab");
}
</script>

</html>