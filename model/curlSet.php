<?php 
defined('HOST_PATH') or exit("contorl path error");

function setCurlOPT($control, $curl)
{
    $cpCurl = $curl;
    global $setCookie;//放到db_temp.php里面了

    if (strlen($control) < 1) {
        echo "#ERROR : domainOPT.setCurlOPT  \$control is null .....";
    }
    switch ($control) {
        case 'www.filgoal.com':
            $cpCurl->opt [CURLOPT_REFERER] = 'https://www.filgoal.com/matches/?date='.date('Y-m-d',time());
            break;
        default:
            $cpCurl->opt [CURLOPT_COOKIE] = '';
            $cpCurl->opt [CURLOPT_ENCODING] = '';
            $cpCurl->opt [CURLOPT_POSTFIELDS] = '';
            $cpCurl->opt [CURLOPT_POST] = '';
            break;
    }
    return $cpCurl;
}
