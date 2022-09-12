<!DOCTYPE html>
<html lang="en-US">
<?
  require 'steamauth/steamauth.php';
require 'steamauth/userInfo.php';
  if (isset($_SESSION['steamid']))
  {
    $id = $_SESSION['steamid'];
  $inventory = array();
    $url = "http://steamcommunity.com/profiles/$id/inventory/json/730/2";
    $json = json_decode(file_get_contents($url));
    foreach($json->rgDescriptions as $value){
      $name = $value->market_hash_name;
      $icon_url = $value->icon_url;
      $trade = $value->tradable;
    $icon = "<img src='http://cdn.steamcommunity.com/economy/image/$icon_url'>";
    array_push($inventory, $curr);
}
}
  else
  {
    #not loggedin
  }
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


    <label for="STEAM_ID">Steam ID: </label>
    <label for="STEAM_ID" id="STEAM_ID">
        <? $_SESSION['steamid'] ?>
    </label> <br>
    <label class="ticket" for="payment">Payment Method:</label>
    <select name="payment" id="payment" onchange="paymentmethod()" required>
        <option>(select)</Option>
        <option value="PP">Paypal</option>
        <option value="CA">Cashapp</option>
        <option value="CRYPTO">Crypto</option>
    </select>
    <label class="ticket" for="PPC" id="PPCI" style="display: none">Paypal Email:</label>
    <input class="input" type="text" id="PPC" name="PPC" placeholder="name@email.com" style="display: none">
    <label class="ticket" for="CACI" id="CACI" style="display: none">Cashapp Tag:</label>
    <input class="input" type="text" id="CAC" name="CAC" placeholder="$name" style="display: none">
    <label class="ticket" for="CRYPTYPE" id="CRYPTYPEI" style="display: none">Type of Crypto:</label>
    <select name="CRYPTYPE" id="CRYPTYPE" onchange="cryptotype()" style="display: none">
        <option>(select)</option>
        <option value="LTC">LTC</option>
        <option value="BTC">BTC</option>
        <option value="ETH">ETH</option>
    </select>
    <label class="ticket" for="CRYPTO" id="CRYPTOI" style="display: none">Crypto address:</label>
    <input class="input" type="text" id="CRYPTO" name="CRYPTO" placeholder="Crypto addy" style="display: none">
    <br>
    <label class="ticket" for="comm">Communication Method: </label>
    <select name="commtype" id="commtype" onchange="commtype()" required>
        <option>(select)</option>
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
</body>
<br>
<label class="ticket" for="OGU">OGU Name (Optional): </label>
<input class="input" type="text" id="OGU" name="OGU"> <br>
<p id="inventory"></p>
<button onclick='select' class="button">Select Skin(s)</button> <br> <br>
<button onclick="submit" class="button">Submit</button>
<hr class="line"> <br>
<?} else{ ?>
<p> Login with Steam to access the shop</p>
<? echo loginbutton();?>
<br>
<?
}?>
<address>
    <div class="footer">
        <p>By using our services you agree to our TOS</p>
        </footer>
</address>
<a href="TOS.php">
    <button title="TOS" class="tos">TOS</button>
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
}

function submit() {
    //go through all of the checkboxes and verify if they are filled in
}
</script>

</html>