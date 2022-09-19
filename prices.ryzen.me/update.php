<!DOCTYPE html>
<html lang="en-US">
<?
    ini_set("allow_url_fopen", 1);
    ?>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>price update</title>
    <link rel="icon" href="https://ryzen.me/images/flavicon.png" />
</head>

<body>
    <button onclick="force_update()">Force Update</button>
    <button onclick="update()">start update loop</button>
</body>


<script>
function force_update() {

    <?php
    
    $url = "https://prices.csgotrader.app/latest/prices_v6.json";
    $fp = fopen(dirname(__FILE__).
        '/prices.json', 'w+');
    $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_USERAGENT => "CURL",
        CURLOPT_AUTOREFERER => true,
        CURLOPT_CONNECTTIMEOUT => 12000,
        CURLOPT_TIMEOUT => 12000,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_FILE => $fp,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
    ];

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $return = [];
    $return['response'] = curl_exec($ch);
    $return['errno'] = curl_errno($ch);
    $return['errmsg'] = curl_error($ch);
    $return['httpcode'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    fclose($fp);
if ($return['httpcode'] == 200) {
    echo $return['response']; //Here is your response
}
?>

}

function update() {
    while (true) {
        const d = new Date();
        let hour = d.getUTCHours();
        if (hour == 4) {
            force_update();
        }
        sleep(60);
    }
}
</script>

</html>