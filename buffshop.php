<!DOCTYPE html>
<html lang="en-US">
<?php
$servername;
$username;
$password;
$conn;
?>

<head>
  <title>Ryzen.me shop</title>
  <link rel="stylesheet" href="ticketsstyles.css">
  <link rel="icon" href="https://ryzen.me/wp-content/uploads/2022/09/ogu_pfp-removebg-preview.png" />
</head>

<body>

 <img class="img-rounded" src="<?=$steamprofile['avatar'];?>"> <b><?=$steamprofile['personaname'];?></b><b class="caret"></b>
<button href="steamauth/logout.php" type="button" class="logout"> logout</button>
  <div class="wp-site-blocks">
    <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img loading="lazy"
        src="https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy.png" alt="" class="wp-image-25" width="302"
        height="131"
        srcset="https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy.png 302w, https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy-300x130.png 300w"
        sizes="(max-width: 302px) 100vw, 302px"></figure>

  </div>
  <label for="STEAM_ID">Steam ID:</label>
  <input type="text" id="STEAM_ID" name="STEAM_ID" placeholder="012345678901234567" required> </input><br>

  <label for="payment">Payment Method:</label>
  <select name="payment" id="payment" required>
    <option value="PP">Paypal</option>
    <option value="CA">Cashapp</option>
    <option value="CRYPTO">Crypto</option>
  </select>
  <input type="text" id="PPC" name="PPC" placeholder="name@email.com" hidden>
  <br>

  <input type="text" id="Name" name="Name" placeholder="Discord (tag), Telegram (Alias), OGU (Alias)">
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
