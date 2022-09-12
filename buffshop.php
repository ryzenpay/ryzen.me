<!DOCTYPE html>
<html lang="en-US">
<?
  require 'steamauth/steamauth.php';
require 'steamauth/userInfo.php';
  if (isset($_SESSION['steamid']))
  {
    $id = $_SESSION['steamid'];

    $url = "http://steamcommunity.com/profiles/$id/inventory/json/730/2";
    $json = json_decode(file_get_contents($url));
    foreach($json->rgInventory as $value => $v){
    $int = $int + 1;
      $name = $v->market_hash_name;
      $icon_url = $v->icon_url;
      $trade = $v->tradable;
    $icon = "<img src='http://cdn.steamcommunity.com/economy/image/$icon_url'>";
}
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

  <div class="wp-site-blocks">
    <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img loading="lazy"
        src="https://ryzen.me/images/ryzen_calligraphy.png" alt="" class="wp-image-25" width="302" height="131"
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
  <p id="inventory"></p>
  <hr class="line"> <br>
   <?} else{ ?>
    <p class="login"> Login with Steam to access the shop</p>
    <? echo loginbutton();?>
  <br>
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
  function inventory(){
     var ids = getID($json.rgInventory);
     var item = getItems($json.rgDescriptions);
            for (var i = 0; i < ids.length; i++) {
                for (var k = 0; k < item.length; k++) {
                    if (ids[i].classid == item[k].classid) {
                        ids[i].market_name = item[k].market_name;
                        ids[i].icon_url = item[k].icon_url;
                        ids[i].tradable = item[k].tradable;
                    }
                }
            }
  }
</script>

</html>