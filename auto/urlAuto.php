<?php 
set_time_limit(600);
//设定页面编码
header("Content-Type:text/html;charset=utf-8");
//设定时区
date_default_timezone_set('Africa/Cairo');

error_reporting(E_ALL ^ E_NOTICE);

//禁止浏览器访问
if (PHP_SAPI != 'cli') {
    return '客户端无法访问';
}

//全局加载
include_once(dirname(__FILE__).'/../conf/include.php');


//提取所有业务文件
$filesNames = scandir(HOST_PATH.'/control/');
// var_dump($filesNames);die();
$fileType = '.class.php';
$existFiles = array();

//载入所有业务
foreach ($filesNames as $key => $fileName)
{
    if (strpos($fileName, $fileType)) {
        include_once(HOST_PATH.'/control/'.$fileName);
        $temp = explode('.', $fileName);
        $fileFirstName = '';
        for ($i=0; $i < count($temp) - 2; $i++) { 
            $fileFirstName = $fileFirstName . $temp[$i] . '.';
        }
        $existFiles[trim($fileFirstName,'.')] = true;
    }
}
$now = time();

$urlInfo = $dbo->loadAssocList("SELECT * FROM `link_list` WHERE `start_time`<= '{$now}' AND `end_time` >= '{$now}' ");

//配置变量加载
include_once(dirname(__FILE__).'/../conf/incloudeURL.php');

echo "<pre>".date('Y-m-d H:i:s').'<br/>'.PHP_EOL;
// var_dump($existFiles);
## Fetch start
use Ares333\CurlMulti\Core;
$stime = microtime(true);
$curl = new Core();
$curl->opt [CURLOPT_USERAGENT]      = getUserAgentInfo();
// $curl->opt [CURLOPT_HTTPHEADER]     = getUserIP();
$curl->opt [CURLOPT_REFERER]        = getUserReferer();
$curl->opt [CURLOPT_SSL_VERIFYPEER] = FALSE;//不验证SSL
$curl->opt [CURLOPT_SSL_VERIFYHOST] = FALSE;//不验证SSL
$curl->cbTask = array('work');
$curl->maxThread = 4;//线程数
$curl->maxTry = 6;//失败重试
$curl->start();
$etime = microtime(true);
echo "Finished in .. ". round($etime - $stime, 3) ." seconds\n";

function work()
{
    global $curl;
    global $urlInfo;
    global $control;
    global $existFiles;
    

    $randUrls = array();
    foreach ($urlInfo as $Tkey => $urls)
    {
        if (@isset($existFiles['www.filgoal.com']))
        {
            $urlData['id'] = $urls['id'];
            $urlData['fun'] = 'getUrl';
            $urlData['url'] = $urls['url'];
            $randUrls[] = $urlData;
        }
    }

    shuffle($randUrls);//随机处理
    // print_format($randUrls);die();
    foreach ($randUrls as $key => $urlData)
    {
        //获得回掉函数名
        $callFunName = getControlFunFirstName('www.filgoal.com').'_Funtion';

        //特殊设置
        $curlOne = setCurlOPT('www.filgoal.com', $curl);
        
        $curl->add([
                    'url' => $urlData['url'],
                    'args' => $urlData,
                    'opt' => $curlOne->opt,
                ], $callFunName);
        echo "#CURL : ".$urlData['url'] . PHP_EOL;
    }
    echo "#RUNING : get url count ( ".count($randUrls)." )". PHP_EOL;
    $curl->cbTask = null;
}


// print_format($statisticsInfo,'$statisticsInfo');



// print_format($urlInfo, '$urlInfo');






