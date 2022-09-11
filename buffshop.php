<!DOCTYPE html>
<html lang="en-US">
<?
  require 'steamauth/steamauth.php';
require 'steamauth/userInfo.php';
  if (isset($_SESSION['steamid']))
  {
    $id = $_SESSION['steamid'];

  }
  else
  {
    #not loggedin
  }
?>

<head>
  <title>Ryzen.me shop</title>
  <link rel="stylesheet" href="ticketsstyles.css">
  <link rel="icon" href="https://ryzen.me/images/flavicon.png" />
</head>

<body>

  <img class="img-rounded" src="<?=$steamprofile['avatar'];?>"> <b>
    <?=$steamprofile['personaname'];?>
  </b><b class="caret"></b>
  <button href="steamauth/logout.php" type="button" class="logout"> logout</button>
  <div class="wp-site-blocks">
    <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img loading="lazy"
        src="https://ryzen.me/images/ryzen_calligraphy.png" alt="" class="wp-image-25" width="302" height="131"
        srcset="https://ryzen.me/images/ryzen_calligraphy.png 302w, https://ryzen.me/images/ryzen_calligraphy.png 300w"
        sizes="(max-width: 302px) 100vw, 302px"></figure>
  </div>
  <hr class="line"> <br>
  <div class="navigation">
    <? if(isset($_SESSION['steamid'])) {?>
    <img class="img-rounded" src="<?=$steamprofile['avatar'];?>"> <b>
      <?=$steamprofile['personaname'];?>
    </b><b class="caret"></b>
    <button href="steamauth/logout.php" type="button" class="logout"> logout</button>
    <button type="button" class="shop">Shop</button>
  </div>
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
  <input class="input" type="text" id="PPC" name="PPC" placeholder="name@email.com" hidden>
  <input class="input" type="text" id="CA" name="CA" placeholder="$name" hidden>
  <select name="CRYPTYPE" id="CRYPTYPE" onchange="cryptotype()" hidden>
    <option>(select)</option>
    <option>LTC</option>
    <option>BTC</option>
    <option>ETH</option>
  </select>
  <input class="input" type="text" id="CRYPTO" name="CRYPTO" placeholder="Crypto addy" hidden>
  <br>
  <label class="ticket" for="comm">Communication Method: </label>
  <input class="input" type="text" id="comm" name="comm" placeholder="Discord (tag), Telegram (Alias), OGU (Alias)"
    required> <br>
  <label class="ticket" for="OGU">OGU Name (Optional): </label>
  <input class="input" type="text" id="OGU" name="OGU"> <br>
  <hr class="line"> <br>
  <? } else{?>
  <br>
  <button type="button" class="login"> Login with Steam to access the shop</button>
  <? echo loginbutton();?>
  <? } ?>
</body>
<script>
  function newID() {
    //obtain latest id from database +1
  }
  function steamID() {
    //obtain steam user id from when they logged in
  }
  function paymentmethod() {
    if (document.getElementById('payment'), value == "(select)") {
    }
    else if (document.getElementById('payment').value == "PP") {
      document.getElementById('CRYPTO').value = "NULL";
      document.getElementById('PP').style.visibility = 'visible';
    }
    else if (document.getElementById("payment").value == "CA") {
      document.getElementById('CRYPTO').value = "NULL";
      document.getElementById('CA').style.visibility = 'visible';
    }
    else if (document.getElementById("payment").value == "CRYPTO") {
      document.getElementById('CRYPTYPE').style.visibility = 'visible';
    }
  }
  function cryptotype() {
    document.getElementById('CRYPTO').style.visibility = 'visible';
  }
</script>

</html>