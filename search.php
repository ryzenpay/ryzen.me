<!DOCTYPE html>
<html lang="en-US">
<?php

$servername = "localhost";
$username = "readonly";
$password = "secret_password";
$db = "prices";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
if ($_GET['page'] == null || "0"){
    $page = 1;
}
else{
    $page = $_GET['page'];
}
?>

<head>
    <title>Ryzen.me buff search</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/flavicon.png" />
    <a href="index.php"><button type="button" class="headbutton">Home</button></a>
    <a href="social.php"><button type="button" class="headbutton">Socials</button></a>
    <a href="inventory.php"><button type="button" class="headbutton">Inventory price
            check</button></a>
    <a href="search.php"><button type="button" class="headbutton" style="background-color:purple">Buff database
            search</button></a>
    <a href="exchange.php"><button type="button" class="headbutton">Exchange</button></a>
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">
<style>
body {
    background-image: url("images/Background.png");
}

::-webkit-scrollbar {
    width: 5px;
}

::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.2)
}

::-webkit-scrollbar-thumb {
    background: #b651e0;
    border: 1px solid black;
    border-radius: 3px;
}
</style>

<body>
    <br><br>
    <img src="images/ryzen_calligraphy.png" class="cover">
    <hr class="line"> <br>
    <form name="Searchmenu" action="" method="get">
        <?php
        ?>
        <label for="skins">Skins in database:</label>
        <input type="text" id="skins" name="skins" value="0" class="hiddeninput" size="1" readonly> <br>
        <?php
        $sql = "select * from prices";
        $result = $conn->query($sql);
        $rowcount = mysqli_num_rows( $result );
                        echo
                    '<script type="text/javascript">
                    document.getElementById("skins").setAttribute("value","' . $rowcount . '");
                    document.getElementById("value").setAttribute("size","' . strlen((string)$rowcount) . '");
                    </script>';
        ?>
        <label for="searchbar">Buff search:</label>
        <input type="text" id="searchbar" name="searchbar" class="input"
            value="<?php echo htmlspecialchars($_GET['searchbar']); ?>">
        <?php
        echo '<a href="search.php?searchbar="'.$_GET["searchbar"].'"&page="'.$_GET["page"].'"">
            <button class="minibutton">search</button>
        </a>'
            ?>
    </form>
    <hr class="line">
    <?php
echo '<p>Search results: </p>';
$inputarray = explode(' ',$_GET['searchbar']);
$sql = "select * from prices where name like '%". $inputarray[0] ."%'";
for ($int = 1; $int < count($inputarray); $int++){
    $sql .=" and name like '%".$inputarray[$int]."%'";
}

$result = $conn->query($sql);
$array = array();
if ($result->num_rows > 0){
    echo '<table>';
    echo '<tr><th>Name</th><th>price</th></tr>';
while($row = $result->fetch_assoc() ){
    $name = $row["name"];
    $name = str_replace('StatTrak™', 'ST™', $name);
    $name = str_replace('Factory New', 'FN', $name);
    $name = str_replace('Minimal Wear', 'MW', $name);
    $name = str_replace('Field-Tested', 'FT', $name);
    $name = str_replace('Well-Worn', 'WW', $name);
    $name = str_replace('Battle Scarred', 'BS', $name);
    array_push($array, array($name, $row["price"]));
}
$display = $page * 100;
for ($int = ($display - 100); $int < $display; $int++){
    echo '<tr><td>'.$array[$int][0].'</td><td>$'.$array[$int][1]."</td></tr>";
}
echo '</table>';
}
 else {
	echo "0 records";
}
?>
    <form name="pagemenu" action="" method="get">
        <?php
echo '<a href="search.php?searchbar="' . $_GET["searchbar"] . '"&page="' . ($_GET["page"] - 1) . '"">
            <button class="minibutton">-</button>
        </a>';
            ?>
        <input type="text" id="page" name="page" value="<?php $_GET['page']; ?>" class="hiddeninput" size="1">
        <?php
echo '<a href="search.php?searchbar="' . $_GET["searchbar"] . '"&page="' . ($_GET["page"] + 1) . '"">
            <button class="minibutton">+</button>
        </a>';
            ?>
    </form>
    <br>
    <hr class="line"> <br>
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

</html