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
  <link rel="icon" href="https://ryzen.me/wp-content/uploads/2022/09/ogu_pfp-removebg-preview.png" />
</head>

<body>
<<<<<<< HEAD

 <img class="img-rounded" src="<?=$steamprofile['avatar'];?>"> <b><?=$steamprofile['personaname'];?></b><b class="caret"></b>
<button href="steamauth/logout.php" type="button" class="logout"> logout</button>
=======
>>>>>>> 0506b9c342dcfd1cc4be981648135c0bfae34f01
  <div class="wp-site-blocks">
    <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img loading="lazy"
        src="https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy.png" alt="" class="wp-image-25" width="302"
        height="131"
        srcset="https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy.png 302w, https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy-300x130.png 300w"
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
  <select name="payment" id="payment" required>
    <option value="PP">Paypal</option>
    <option value="CA">Cashapp</option>
    <option value="CRYPTO">Crypto</option>
  </select>
  <input class="input" type="text" id="PPC" name="PPC" placeholder="name@email.com" hidden>
  <br>
  <label class="ticket" for="comm">Communication Method: </label>
  <input class="input" type="text" id="comm" name="comm" placeholder="Discord (tag), Telegram (Alias), OGU (Alias)" required> <br>
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
    if (document.getElementById('payment').value == "PP") {
      //make input box appear
    }
    else if (document.getElementById("payment").value == "CA") {

    }
    else if (document.getElementById("payment").value == "CRYPTO") {

    }
  }
</script>

</html>