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

<body>
    <br><br>
    <img src="images/ryzen_calligraphy.png" class="cover">
    <hr class="line">
    <h2 style="color:#b651e0">
        <img src="images/discord.png" class="image">
        Discord: <button onclick="disccopy()" title="Copy" class="minibutton">ryzen#8829</button><br>
        <img src="images/cashapp.png" class="image">
        CashApp: <button onclick="cashcopy()" title="Copy" class="minibutton">$Zaiga</button> <br>
        <img src="images/telegram.png" class="image">
        Telegram:<button onclick="telecopy()" title="Open in new tab" class="minibutton">@highballer </button> <br>
        <img src="images/steam.png" class="image">
        Steam:<button onclick="steamtradecopy()" title="Open in new tab" class="minibutton">Steam trade
            link</button><br>
        <img src="images/discord.png" class="image">
        Exchange server: <button onclick="discord()" title="Open in new tab" class="minibutton">Discord
            (.gg/ryzen)</button>
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
window.addEventListener('load', function() {
    document.getElementsByTagName("body").style.backgroundColor = 'white';
});

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
    navigator.clipboard.writeText('https://discord.gg/ryzen');
    window.open('https://discord.gg/ryzen', '_blank');
}
</script>

</html>