<?php
    function fetch_data($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    $count = 10; // the number of photos you want to fetch
    $access_token = "IGQVJWNHJBWGRWVGxRQzAxbjQ4Vm5XUlJwcDcwbi0tcDZAwT2NwQmhiNHVqcmU1R3NXRDNLN3pnZAUhpY0dxM3V3eTAwcVo5em40Tm9Gdkl5V1ZAOUTFzLU02dnNHSThlMlh6S1lkMkZA3";
    $display_size = "thumbnail"; // you can choose between "low_resolution", "thumbnail" and "standard_resolution"

    $result = fetch_data("https://graph.instagram.com/me/media?fields=id,permalink,media_url,caption&access_token=$access_token");
    $result = json_decode($result);
    //print_r($result);
    foreach ($result as $photo) {
        //print_r($photo);
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
    }
?>