<?php
// 60 days token
$response = get_web_page("https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret=bc58552c213d2abde206d3d76c44104b&access_token=IGQVJXU0tlcWY5NjJkaTN4cEl4TFBReUFMemdod3ZADX1ZAGSTNtMGhXZAk5JaXFnRm5uaUQwdWo3dG10Umwtb0QxM3dFejlZAZAHExUXpKWWdrbnBKQ25ueE1ZAa0c5ZA1YzeGlNcU1aVUFUd2RGaldEYWJ5SGNMTlpSc2JDcVF3");
$resArr = array();
$resArr = json_decode($response);
echo "<pre>"; print_r($resArr); echo "</pre>";

function get_web_page($url) {
    $options = array(
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
        CURLOPT_ENCODING       => "",     // handle compressed
        CURLOPT_USERAGENT      => "test", // name of client
        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        CURLOPT_TIMEOUT        => 120,    // time-out on response
    ); 

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    curl_close($ch);

    return $content;
}
?>