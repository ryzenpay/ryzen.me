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

<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Ryzen.me</title>
    <link rel="icon" href="https://ryzen.me/wp-content/uploads/2022/09/ogu_pfp-removebg-preview.png" />
</head>
<div class="navigation">
    <a class="active" href="main.html">Home</a>
    <a href="tickets.html">BuffShop</a>
</div>
<body>
  <? if(isset($_SESSION['steamid'])) {?>
    <img class="img-rounded" src="<?=$steamprofile['avatar'];?>"> <b><?=$steamprofile['personaname'];?></b><b class="caret"></b>
        <button href="steamauth/logout.php"type="button" class="logout"> logout</button>
    <a href="tickets.php">
      <button type="button" class="shop">Shop</button>
      </a>
  <? } else{?>
    <button type="button" class="login"> Login with Steam to access the shop</button>
    <? echo loginbutton();?>
<? } ?>


    <div class="wp-site-blocks">
        <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img
                loading="lazy" src="https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy.png" alt=""
                class="wp-image-25" width="302" height="131"
                srcset="https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy.png 302w, https://ryzen.me/wp-content/uploads/2022/09/ryzen-calligraphy-300x130.png 300w"
                sizes="(max-width: 302px) 100vw, 302px"></figure>
<hr class="line"> <br>
        <h2 style="color:#b651e0">Discord: <button onclick="disccopy()" title="Copy" class="minibutton">ryzen#8829
            </button>
            <br>CashApp: <button onclick="cashcopy()" title="Copy" class="minibutton">$Zaiga
            </button> <br>Telegram:
            <button onclick="telecopy()" title="Copy" class="minibutton">@highballer </button> <br> Steam:
            <button onclick="steamtradecopy()" title="Open in new tab" class="minibutton">Steam trade link </button>
        </h2>
        <hr class="line">
    </div>
    <address>
        <div class="footer">
            <p>Author:Ryzen</p>
            <p>Collaborator: Ezi</p>
            </footer>
    </address>
</body>
<script>
    function paypcopy() {
        navigator.clipboard.writeText("Nissangt420@gmail.com");
    }
    function cashcopy() {
        navigator.clipboard.writeText("$Zaiga");
    }
    function disccopy() {
        navigator.clipboard.writeText("ryzen#8829");
    }
    function steamtradecopy() {
        window.open('https://steamcommunity.com/tradeoffer/new/?partner=1092089915&token=o8jkW4va', '_blank');
        alert("Opened in new tab");
    }
    function telecopy() {
        navigator.clipboard.writeText("@highballer");
        window.open('https://t.me/highballer', '_blank');
        alert('Opened in new tab');
    }
</script>

</html>
