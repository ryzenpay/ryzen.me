<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Ryzen.me shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/flavicon.png" />
</head>
<hr class="headline" style="top: -10px;">
<hr class="headline" style="bottom: -10px;">
<style>
body {
    background-image: url("images/shopbackground.png");
}
</style>

<body>
    <div class="wp-site-blocks">
        <figure class="wp-block-image size-full is-resized is-style-default" style="border-radius:0px"><img
                loading="lazy" src="images/ryzen_calligraphy.png" alt="" class="wp-image-25" width="302" height="131"
                srcset="images/ryzen_calligraphy.png 302w, images/ryzen_calligraphy.png 300w"
                sizes="(max-width: 302px) 100vw, 302px"></figure>
    </div>
    <hr class="line"> <br>
    <a href="social.php">
        <button type="button" class="home">Home</button>
    </a>
    <a href="buffshop.php">
        <button type="button" class="minibutton">Shop</button>
    </a>
    <br>

    <label for="searchbar">Search Buffdatabase:</label>
    <input type="text" id="searchbar" name="searchbar" onchange="search()">
    <br>
    <script>
    function search() {
        <?php
     $url = 'prices.json';
    $buff = json_decode(file_get_contents($url2), true);
    $index = $_GET["searchbar"];
    $array = array_filter($buff, $index);
    echo '<p>All current results: </p>';
    foreach($array as $value){
    $price = ($value['buff163']['starting_at']['price'] * 0.141279);
    echo '<p>' . $value . '|' . $price . '</p>';
}
?>
    }
    </script>
    <br>
    <hr class="line"> <br>
</body>

</html>