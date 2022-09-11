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
  <input class="hidden" type="text" id="PPC" name="PPC" placeholder="name@email.com" >
  <input class="hidden" type="text" id="CAC" name="CAC" placeholder="$name">
  <select class="hidden" name="CRYPTYPE" id="CRYPTYPE" onchange="cryptotype()">
    <option>(select)</option>
    <option>LTC</option>
    <option>BTC</option>
    <option>ETH</option>
  </select>
  <input class="hidden" type="text" id="CRYPTOC" name="CRYPTOC" placeholder="Crypto addy">
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
  <?
}?>
</body>
<script>
  function newID() {
    //obtain latest id from database +1
  }
  function steamID() {
    //obtain steam user id from when they logged in
  }
  function paymentmethod() {
    if (document.getElementById('payment').value == "(select)") {
      document.getElementById('PPC').className = "hidden";
      document.getElementById('CAC').className = "hidden";
      document.getElementById('CRYPTOC').className = "hidden";
      document.getElementById('CRYPTYPE').className = "hidden";
    }
    else if (document.getElementById('payment').value == "PP") {
      document.getElementById('CRYPTOC').value = "NULL";
      document.getElementById('PPC').className = "shown";
      document.getElementById('CAC').className = "hidden";
      document.getElementById('CRYPTOC').className = "hidden";
      document.getElementById('CRYPTYPE').className = "hidden";
    }
    else if (document.getElementById("payment").value == "CA") {
      document.getElementById('CRYPTOC').value = "NULL";
      document.getElementById('CAC').className = "shown";
            document.getElementById('PPC').className = "hidden";
      document.getElementById('CRYPTOC').className = "hidden";
      document.getElementById('CRYPTYPE').className = "hidden";
    }
    else if (document.getElementById("payment").value == "CRYPTO") {
      document.getElementById('CRYPTYPE').className = "shown";
      document.getElementById('CAC').className = "hidden";
      document.getElementById('PPC').className = "hidden";
    }
  }
  function cryptotype() {
  }