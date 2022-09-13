<!DOCTYPE html>
<html lang="en-US">
<?
  require 'steamauth/steamauth.php';
require 'steamauth/userInfo.php';
?>

<head>
    <title>Ryzen.me shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="https://ryzen.me/images/flavicon.png" />
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">

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
    <? if(isset($_SESSION['steamid'])) {?>
    <img class="img-rounded" src="<?=$steamprofile['avatar'];?>"> <b class="username">
        <?= $steamprofile['personaname']; ?>
    </b><b class="caret"></b>
    <? echo logoutbutton(); ?>

    <a href='https://steamcommunity.com/my/tradeoffers/privacy' target="_blank">
        <label for="trade">Tradelink: </label> </a>
    <input class="input" type="text" id="trade" name="trade"> <br>
    <label for="STEAM_ID" id="STEAM_ID">
        <? $_SESSION['steamid'] ?>
    </label> <br>
    <p style="clear:both">
        <label class="ticket" for="payment">Payment Method:</label>
        <select class="d-inline-flex" name="payment" id="payment" onchange="paymentmethod()" required>
            <option value=''>(select)</Option>
            <option value="PP">Paypal</option>
            <option value="CA">Cashapp</option>
            <option value="CRYPTO">Crypto</option>
        </select>
        <label class="ticket" for="PPC" id="PPCI" style="display: none">Paypal Email:</label>
        <input class="input" type="text" id="PPC" name="PPC" placeholder="name@email.com" style="display: none">
        <label class="ticket" for="CACI" id="CACI" style="display: none">Cashapp Tag:</label>
        <input class="input" type="text" id="CAC" name="CAC" placeholder="$name" style="display: none">
        <label class="ticket" for="CRYPTYPE" id="CRYPTYPEI" style="display: none">Type of Crypto:</label>
        <select class="d-inline-flex" name="CRYPTYPE" id="CRYPTYPE" onchange="cryptotype()" style="display: none">
            <option value=''>(select)</option>
            <option value="LTC">LTC</option>
            <option value="BTC">BTC</option>
            <option value="ETH">ETH</option>
        </select> <br>
        <label class="ticket" for="CRYPTO" id="CRYPTOI" style="display: none">Crypto address:</label>
        <input class="input" type="text" id="CRYPTO" name="CRYPTO" placeholder="Crypto addy" style="display: none">
    </p>
    <br>
    <p style="clear:both">
        <label class="ticket" for="comm">Communication Method: </label>
        <select class="d-inline-flex" name="commtype" id="commtype" onchange="commtype()" required>
            <option value=''>(select)</option>
            <option value="disc">Discord</option>
            <option value="tele">Telegram</option>
            <option value="ogu">OGU DM</option>
        </select>
        <label class="ticket" for="disci" id="disci" style="display: none">Discord: </label>
        <input class="input" type="text" id="disc" name="disc" placeholder="name#0000" style="display: none">
        <label class="ticket" for="tele" id="telei" style="display: none">Telegram: </label>
        <input class="input" type="text" id="tele" name="tele" placeholder="@name" style="display: none">
        <label class="ticket" for="ogu" id="ogui" style="display: none">OGU Name: </label>
        <input class="input" type="text" id="ogu" name="ogu" placeholder="name" style="display: none">
    </p>
    <br>
</body>
<br>
<label class="ticket" for="OGU">OGU Name (Optional): </label>
<input class="input" type="text" id="ogu2" name="ogu2"> <br>
<p style="clear:both">
<p id="inventory"></p>
<button onclick='select' class="minibutton">
    <? $skins ?>Skin(s) Selected
</button> <br> <br>
<form method="post">
    <select name="skin">
        <option selected="selected">Choose a skin</option>
        <?php 
        $id = $_SESSION['steamid'];
        $url = "http://steamcommunity.com/profiles/$id/inventory/json/730/2";
        $json = json_decode(file_get_contents($url));
$i = 0;
foreach ($json->rgDescriptions as $value => $v) {
    $name = $v->market_hash_name;
    $icon_url = $v->icon_url;
    $price = 0.00;
    //obtain price (if crypto -2 bucks) (if price = 0 reject)
    echo '<option value='.$i.'>' . $name . ' | $' . $price . '</option>';
}
        ?>
    </select> <br>
    <hr class="line"> <br>
    <button onclick="paycheck" class="button">Submit</button>
    <?} else { ?>
    <p> Login with Steam to access the shop</p>
    <? echo loginbutton();?>
    <br>
    <?
}?>
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
    function paymentmethod() {
        if (document.getElementById('payment').value == "") {
            document.getElementById('PPC').style = "display: none";
            document.getElementById('PPCI').style = "display: none";
            document.getElementById('CAC').style = "display: none";
            document.getElementById('CACI').style = "display: none";
            document.getElementById('CRYPTYPE').style = "display: none";
            document.getElementById('CRYPTYPEI').style = "display: none";
            document.getElementById('CRYPTO').style = "display: none";
            document.getElementById('CRYPTOI').style = "display: none";
        } else if (document.getElementById('payment').value == "PP") {
            document.getElementById('CRYPTO').value = "NULL";
            document.getElementById('PPC').style = "display: block";
            document.getElementById('PPCI').style = "display: block";
            document.getElementById('CAC').style = "display: none";
            document.getElementById('CACI').style = "display: none";
            document.getElementById('CRYPTYPE').style = "display: none";
            document.getElementById('CRYPTYPEI').style = "display: none";
        } else if (document.getElementById("payment").value == "CA") {
            document.getElementById('CRYPTO').value = "NULL";
            document.getElementById('CAC').style = "display: block";
            document.getElementById('CACI').style = "display: block";
            document.getElementById('PPC').style = "display: none";
            document.getElementById('PPCI').style = "display: none";
            document.getElementById('CRYPTYPE').style = "display: none";
            document.getElementById('CRYPTYPEI').style = "display: none";
        } else if (document.getElementById("payment").value == "CRYPTO") {
            document.getElementById('CRYPTYPE').style = "display: block";
            document.getElementById('CRYPTYPEI').style = "display: block";
            document.getElementById('PPC').style = "display: none";
            document.getElementById('PPCI').style = "display: none";
            document.getElementById('CAC').style = "display: none";
            document.getElementById('CACI').style = "display: none";
        }
    }

    function cryptotype() {
        if (document.getElementById('payment').value == "") {
            document.getElementById('CRYPTO').style = "display: none";
        } else {
            document.getElementById('CRYPTO').value = "";
            document.getElementById('CRYPTO').style = "display: block";
        }
    }

    function commtype() {
        if (document.getElementById('commtype').value == "") {
            document.getElementById('disci').style = "display: none";
            document.getElementById('disc').style = "display: none";
            document.getElementById('tele').style = "display: none";
            document.getElementById('telei').style = "display: none";
            document.getElementById('ogu').style = "display: none";
            document.getElementById('ogui').style = "display: none";
        } else if (document.getElementById('commtype').value == "tele") {
            document.getElementById('disci').style = "display: none";
            document.getElementById('disc').style = "display: none";
            document.getElementById('tele').style = "display: block";
            document.getElementById('telei').style = "display: block";
            document.getElementById('ogu').style = "display: none";
            document.getElementById('ogui').style = "display: none";
        } else if (document.getElementById('commtype').value == "disc") {
            document.getElementById('disci').style = "display: block";
            document.getElementById('disc').style = "display: block";
            document.getElementById('tele').style = "display: none";
            document.getElementById('telei').style = "display: none";
            document.getElementById('ogu').style = "display: none";
            document.getElementById('ogui').style = "display: none";
        } else if (document.getElementById('commtype').value == "ogu") {
            document.getElementById('disci').style = "display: none";
            document.getElementById('disc').style = "display: none";
            document.getElementById('tele').style = "display: none";
            document.getElementById('telei').style = "display: none";
            document.getElementById('ogu').style = "display: block";
            document.getElementById('ogui').style = "display: block";
        }
    }

    function select() {
        //if >=1 selected, change text to 'nmbr skins selected'
        // pop up new window to select skins
        <?php $skins ?>
    }

    function paycheck() {
        if (document.getElementById('payment').value == '') {
            alert("Please select payment option");
            break;
        } else if (document.getElementById('payment').value == 'PP') {
            if (document.getElementById('PPC').value = '') {
                alert("Please input your paypal email");
                break;
            } else if (!document.getElementById('PPC').value.includes('@') || !document.getElementById('PPC').value
                .includes('.')) {
                alert("Please input valid paypal email");
                break;
            } else {
                $payment = 'Paypal';
                $payment_id = document.getElementById('PPC').value;
                commcheck();
            }
        } else if (document.getElementById('payment').value == 'CA') {
            if (document.getElementById('CAC').value == '') {
                alert('Please input a cashapp tag');
                break;
            } else if (!document.getElementById('CAC').value.includes(
                    '$')) {
                alert("Please input valid Cashapp Tag");
                break;
            } else {
                $payment = 'Cashapp';
                $payment_id = document.getElementById('CAC').value;
                commcheck();
            }
        } else if (document.getElementById('payment').value == 'CRYPTO') {
            if (document.getElementById('CRYPTYPE').value == '') {
                alert('Please select type of crypto');
                break;
            } else {
                if (document.getElementById('CRYPTO').value == '') {
                    alert("Please input a crypto address");
                    break;
                } else {
                    $payment = document.getElementById('CRYPTYPE').value;
                    $payment_id = document.getElementById('CRYPTO').value;
                    commcheck();
                }
            }
        }
    }

    function commcheck() {
        if (document.getElementById('commtype').value == "") {
            alert('please select a communication method');
            break;
        } else if (document.getElementById('commtype').value == "disc") {
            if (!document.getElementById('disc').value.includes('#')) {
                alert('Please input correct discord tag');
            } else {
                $comm = document.getElementById('disc').value;
                submit();
            }
        } else if (document.getElementById('commtype').value == 'tele') {
            if (!document.getElementById('tele').value.includes('@')) {
                alert('Please input correct telegram alias');
            } else {
                $comm = document.getElementById('tele').value;
                submit();
            }
        } else {
            $comm = document.getElementById('ogu').value;
            submit();
        }
    }

    function submit() {
        if (document.getElementById('trade').value == '') {
            alert('Please input valid trade link');
        } else {
            if (document.getElementById('ogu2').value == '') {
                $ogu = 'NULL';
            } else {
                $ogu = document.getElementById('ogu2').value;
            }
            $trade = document.getElementById('id').value;
            mysqli_query($con, $sql);
        }
    }
    </script>

</html>