<?php
    set_time_limit(0);
    header("Content-type: text/javascript");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $GetTime = date('Y-m-d-H', time());
function CURL($URLs) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $URLs,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false
    ));
    $Reponse = curl_exec($ch);
    curl_close($ch);
    return $Reponse;
}
    $URL = 'https://b.xemphim.plus/suggestions/titles-'.$GetTime.'.json';
    $Reponse = json_decode(CURL($URL));
    $CountRe = count($Reponse);

for ($i = 0; $i < $CountRe - 1;$i++) {
    for ($j = $i +1; $j < $CountRe; $j++) {
        if ($Reponse[$i][0] < $Reponse[$j][0]) {
            $temp = $Reponse[$j];
            $Reponse[$j] = $Reponse[$i];
            $Reponse[$i] = $temp;
        }
    }
}
    file_put_contents('updatephim.json', json_encode($Reponse));
    
