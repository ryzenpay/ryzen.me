<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Ryzen.me</title>
    <link rel="icon" href="images/flavicon.png" />
    <a href="index.php"><button type="button" class="headbutton" style="background-color: purple">Home</button></a>
    <a href="inventory.php"><button type="button" class="headbutton">Inventory price
            check</button></a>
    <a href="search.php"><button type="button" class="headbutton">Buff database search</button></a>
    <a href="exchange.php"><button type="button" class="headbutton">Exchange</button></a>
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">
<style>
body {
    background-image: url("images/Background.png");
}
</style>

<body>
    <br><br>
    <img src="images/ryzen_calligraphy.png" class="cover">
    <hr class="line">
    <h2 style="color:#b651e0">Discord: <button onclick="disccopy()" title="Copy" class="minibutton">ryzen#8829
        </button>
        <br>CashApp: <button onclick="cashcopy()" title="Copy" class="minibutton">$Zaiga
        </button> <br>Telegram:
        <button onclick="telecopy()" title="Open in new tab" class="minibutton">@highballer </button> <br> Steam:
        <button onclick="steamtradecopy()" title="Open in new tab" class="minibutton">Steam trade link </button>
        <br> Exchange server: <button onclick="discord()" title="Open in new tab" class="minibutton">Discord
            invite</button>
    </h2>
    <hr class="line">
    <address>
        <div class="footer">
            <p>Author:Ryzen</p>
            <p>Collaborator: Ezi</p>
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
}

function telecopy() {
    navigator.clipboard.writeText("@highballer");
    window.open('https://t.me/highballer', '_blank');
}

function discord() {
    navigator.clipboard.writeText('https://discord.gg/wE7yQSXsts');
    window.open('https://discord.gg/wE7yQSXsts', '_blank');
}
</script>

</html>