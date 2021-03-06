<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/3/13
 * Time: 下午12:22
 */


#S3资源下载API地址：本机调试需要做host
defined('RRC_GATHER_URL') or define('RRC_GATHER_URL', $sysConfig['RRC_GATHER_URL']);


/**
 * 将文章内图片地址，采集上传CDN
 * @param $content
 * @return mixed
 */
function getContentImages($content, $appName = 'sada', $width = 50, $height = 50)
{
    $content = str_replace('//semedia.filgoal.com', 'https://semedia.filgoal.com', $content);
    global $statisticsInfo;
    global $dbo;
    //提取所有img html，和最新img url
    $replaceArr = array();
    preg_match_all('#<img.*?src="([^"]*)"[^>]*>#i', $content, $match);
//    print_format($match,'$match');
    $count = count($match[1]);
    $getImgCount = 0;
    for ($i = 0; $i < $count; $i++)
    {

        
        $temp = [];
        $temp['find'] = $match[0][$i];
        $imgUrl = $match[1][$i];
        
        $source_sha1 = sha1($imgUrl);
        $sql = "SELECT * FROM `img_list` where `source_sha1`='{$source_sha1}'";
        $rowImg = $dbo->loadAssoc($sql);
        if($rowImg)
        {

            $newImg = $rowImg['cdn_img'];
            echo '在数据库找到了已记录的图片对应CDN地址 -- 源地址： '.$imgUrl.PHP_EOL;
            $byCdn = 0;

        }else{
            #第一次尝试
            $newImg = getSrcByImageCDN($imgUrl, $appName, $width, $height);
            #失败二次重试
            if ($imgUrl == $newImg){
                $newImg = getSrcByImageCDN($imgUrl, $appName, $width, $height);
            }
            #失败三次重试
            if ($imgUrl == $newImg){
                $newImg = getSrcByImageCDN($imgUrl, $appName, $width, $height);
            }
            $byCdn = 1;
        }


        
        if ($imgUrl != $newImg){
            $getImgCount++;
            $statisticsInfo['srcDownload']['success']['count']++;
            if($byCdn == 1)
            {
                try{
                    $sqlex = "INSERT `img_list` VALUES('{$source_sha1}','{$imgUrl}','{$newImg}')";
                    $dbo->exec($sqlex);
                    echo '保存了CDN图片 -- 源地址： '.$imgUrl.PHP_EOL;
                } catch (Exception $e) {
                    echo '源地址： '.$imgUrl." 保存CDN失败 ".PHP_EOL;
                }
            }
            
        }else{
            $statisticsInfo['srcDownload']['Error'][] = $imgUrl;
        }
        $temp['replace'] = '<img src="'.$newImg.'" />';
        $replaceArr[] = $temp;
    }
    // if ($getImgCount < $count){
    //     return array('status'=>0,'content'=>$content,'imgList'=>$replaceArr);
    // }

    foreach ($replaceArr as $replace)
    {
        $content = str_replace($replace['find'],$replace['replace'],$content);
    }

    return array('status'=>1,'content'=>$content,'imgList'=>$replaceArr);
}

/**
 * 调用API保存远程图片并推送到CDN
 * @param $srcURL
 * @param string $appName 应用名称
 * @param int $width 图片宽高
 * @param int $height
 * @param string $ext 图片新扩展名
 * @return mixed
 */
function getSrcByImageCDN($srcURL, $appName = 'sada', $width=0, $height=0, $ext='')
{
    $data = [
        'srcUrl'=>$srcURL,
        'appName'=>$appName,
        'type'=>'image',
        'w'=>$width,
        'h'=>$height,
        'extension' =>$ext
    ];
//    print_format($data,'postData');

    $temp = (array)json_decode(srcPostAPI($data));
    if (!empty($temp['content'])) {
        return $temp['content'];
    }else{
        return $srcURL;
    }
}

/** 获取视频资源
 * @param $srcURL
 * @param string $appName
 * @return mixed
 */
function getSrcByVideoCDN($srcURL, $appName = 'test')
{
    $data = [
        'srcUrl'=>$srcURL,
        'appName'=>$appName,
        'type'=>'video',
        'w'=>0,
        'h'=>0,
        'extension' =>''
    ];

    $temp = (array)json_decode(srcPostAPI($data));
    if (!empty($temp['content'])) {
        return $temp['content'];
    }else{
        return $srcURL;
    }
}



function srcPostAPI($postData = array())
{
    $post = http_build_query($postData);

    $url = RRC_GATHER_URL;

    $header = [
        'Content-Type:application/x-www-form-urlencoded; charset=UTF-8',
        'X-Requested-With:XMLHttpRequest',
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode != 200) {
        $result = json_encode(['code'=>-1,'msg'=>'HTTP_CODE = '.$httpCode,'content'=>$postData['srcUrl']]);
    }else{
        $result = '{'.getPregData('/{(.*?)}/i',$result).'}';
        echo 'srcPostAPI  ==>>>'.$result.PHP_EOL;
//        echo $result.PHP_EOL;
//        print_format((array)json_decode($result),'$result');
    }
    return $result;
}


function getCdnVideo($src)
{
    sleep(4);
    global $sysConfig;
    $post['type'] = 'video';
    $post['srcUrl'] = $src;
    $post['appName'] = 'sada';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sysConfig['video']['cdn_url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_TIMEOUT, 180);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode != 200) {
        echo $httpCode.PHP_EOL;
        echo "get CDN video error set the check=2 err1".PHP_EOL;
        return false;
    }
    $rel = json_decode($result,true);
    return $rel;
}
