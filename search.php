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
    <form action="search.php" method="post" action="1-form.php">
        <label for="search">Search Buffdatabase:</label>
        <input type="text" name="search" required />
        <input type="submit" value="Search" />
    </form>

    <br>
    <hr class="line"> <br>
</body>

</html>