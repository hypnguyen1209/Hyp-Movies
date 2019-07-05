<?php
 function get_user_ip() {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
                $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
     
$ip = get_user_ip();
$ID = $_GET['id'];
function CURL($URLs) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $URLs,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER => ['x-forwarded-for: '.$ip]
    ));
    $Reponse = curl_exec($ch);
    curl_close($ch);
    return $Reponse;
}
//$REFERER = $_SERVER['HTTP_REFERER'];
//if ( strpos($REFERER, $ID) == true ) {
    $ReponsePlayFilmPage = CURL('https://xemphim.plus/watch/'.$ID);
    $ArrayName = json_decode(file_get_contents('updatephim.json'));
    $n = 0;
    $Name = $ArrayName[$n][2];
    $NameEng = $ArrayName[$n][1];
    while ($ArrayName[$n][0] != $ID) {
    $n++;
    $Name = $ArrayName[$n][2];
    $NameEng = $ArrayName[$n][1];
    
};
    preg_match('#mous">(.+?)</video>#', $ReponsePlayFilmPage, $ArraySubtitlesFilm);
    
    if ($ArraySubtitlesFilm == array()) {
        $textsub = null;
    }
    else {
        $textsub = $ArraySubtitlesFilm[1];
    }
    preg_match('#"srcUrl":"(.+?)","n#', $ReponsePlayFilmPage, $ArrayPlayFilmURL);
    preg_match('#">(.+?)</title>#', $ReponsePlayFilmPage, $ArrayTitleFilm);
    preg_match('#tmdbBackdrop":"(.+?)"#', $ReponsePlayFilmPage, $ArrayPoster);
    //preg_match('#"(.+?)" language="en#', $ReponsePlayFilmPage, $ArraySubtitlesEngFilm);
    $URLPlay = 'https://'.$ArrayPlayFilmURL[1].'/s.mp4';
    //echo $ArraySubtitlesEngFilm[1];
    echo json_encode(array(
        'textsub' => $textsub,
        'nameeng' => $NameEng,
        'name' => $Name,
        'title' => $ArrayTitleFilm[1],
        'file' => $URLPlay,
        'subtitle' => '',
        'logo' => 'https://i.imgur.com/dxILuPT.png',
        'poster' => 'https://image.xemphim.plus/original/'.$ArrayPoster[1]
    ));
//}
