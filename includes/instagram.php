<?php
  // Step First
  //https://api.instagram.com/oauth/authorize?client_id=713872826117570&redirect_uri=https://www.gallerylala.com/&scope=user_profile,user_media&response_type=code

  //17841400950739729
?>

<?php
  //Step Second
  /// curl with PHP 
  // new token
  /*$uri = 'https://api.instagram.com/oauth/access_token';
  $data = [
    'client_id' => '713872826117570', 
    'client_secret' => 'bc58552c213d2abde206d3d76c44104b', 
    'grant_type' => 'authorization_code', 
    'redirect_uri' => 'https://www.gallerylala.com/', 
    'code' => 'AQCn5NStFyfCtXD5YyvkQWJWJgFNTi5Fhq1FGzT_iSHnks6lpIszNWPgs9CR4W6CanAkhOa4lJFrxqKcab9f86bwd7Si2tN7As_1TvkAiKTYIojc2vsJQB5bCxeD1f7bSG6Dr_3H74b6vGOuLPCKCPCZvG_jMuSWEOp5FCaYgeWSIwVc2hhP1Xxu38Ak4xmhMd68E5Fr4xq1DIKHs-vEsxxpYEb7cLrOgyRkdXApaJ0kng#_'
  ];
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $uri);
  curl_setopt($ch, CURLOPT_POST, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_NOBODY, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $result = json_decode(curl_exec($ch));
  echo '<pre>';
  exit(print_r($result));*/
?>
<?php
// Step Third
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
        CURLOPT_USERAGENT      => "Gallerylala", // name of client
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
<?php
// Final Show Feed
    /*function fetch_data($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    $count = 10;
    $access_token = "IGQVJWNHJBWGRWVGxRQzAxbjQ4Vm5XUlJwcDcwbi0tcDZAwT2NwQmhiNHVqcmU1R3NXRDNLN3pnZAUhpY0dxM3V3eTAwcVo5em40Tm9Gdkl5V1ZAOUTFzLU02dnNHSThlMlh6S1lkMkZA3";
    $display_size = "thumbnail"; // you can choose between "low_resolution", "thumbnail" and "standard_resolution"

    $result = fetch_data("https://graph.instagram.com/me/media?fields=id,permalink,media_url,caption&access_token=$access_token");
    $result = json_decode($result);
    //print_r($result);
    foreach ($result as $photo) {
        foreach($photo as $post){
            $perlink = $post->permalink;
            $imglink = $post->media_url;
            $media_cation = $post->caption;
            if($perlink == ""){
            }else{
                if(substr($imglink, 0, 13) == "https://video"){
                    echo '<li class="item"><a href="'.$perlink.'" class="videoimg" target="_blank"><iframe src="'.$imglink.'"></iframe></li>';
                }else{
                    echo '<li class="item"><a href="'.$perlink.'" class="imgdataset" target="_blank"><img src="'.$imglink.'" alt="'.$media_cation.'"></a></li>';
                }
            }
        }
    }*/
?>