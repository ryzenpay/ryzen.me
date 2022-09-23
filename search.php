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
    <div id="searchWrapper">
        <input type="text" name="searchbar" id="searchbar" placeholder="Search through buff database" />
        <script>
        const message = document.querySelector('#searchbar');
        const json = require('./prices.json');
        const buff = JSON.parse(json);
        message.addEventListener('keyup', (input) => {
            let arr = array_filter(buff, input);
            for (let i = 0; i < arr.length() && i < 10; i++) {
                document.getElementById(i).innerHTML = arr + " | " + (arr.buff163.starting_at.price * 0.141279);
            }
        });
        </script>
    </div>
    <br>
    <hr class="line"> <br>
</body>

</html>