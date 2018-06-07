<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/1/22
 * Time: 上午9:41
 */

function getReportByDate()
{
    global $dbo;
    $lastDate = date('Y-m-d', strtotime('-30 days'));//7天内的数据
    $sql = "SELECT `date` , count(1) AS count FROM `articles` where status = 3 AND `date` > '{$lastDate}' GROUP BY  `date`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

function getReportByDomain()
{
    global $dbo;
    $lastDate = date('Y-m-d', strtotime('-14 days'));//7天内的数据
    $sql = "SELECT count(1) AS count, `domain`,`date` FROM `articles` where status = 3 AND `date` > '{$lastDate}' GROUP BY `domain`,`date` ORDER BY `date`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

function getReportFromDomainByDate($date)
{
    global $dbo;
    $sql = "SELECT count(1) AS count, `domain` FROM `articles` where status = 3 AND `date` = '{$date}' GROUP BY `domain`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

function getReportByCate()
{
    global $dbo;
    $lastDate = date('Y-m-d', strtotime('-14 days'));//7天内的数据
    $sql = "SELECT count(1) AS count, `tag`,`date`  FROM `articles` where status = 3 AND `date` > '{$lastDate}' GROUP BY `tag`,`date` ORDER BY `date`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

function getReportFromCateByDate($date)
{
    global $dbo;
    $sql = "SELECT count(1) AS count, `tag` FROM `articles` where status = 3 AND `date` = '{$date}' GROUP BY `tag`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

function getReportByPushLog()
{
    global $dbo;
    $sql = "SELECT count(1) AS count, `resultCode` FROM `push_API_Log`  GROUP BY `resultCode`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

function getReportFromPushLogByDate($date)
{
    global $dbo;
    $sql = "SELECT count(1) AS count, `resultCode` FROM `push_API_Log` where `date` = '{$date}' GROUP BY `resultCode`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

function getReportByRepeat()
{
    global $dbo;
    $sql = "SELECT count(1) AS count, `repeatTimes` FROM `push_Repeat`  GROUP BY `repeatTimes`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

function getReportFromRepeatByDate($date)
{
    global $dbo;
    $startTime = $date.' 00:00:00';
    $endTime = $date.' 23:59:59';
    $sql = "SELECT count(1) AS count, `repeatTimes` FROM `push_Repeat` where `dateTime` >= '{$startTime}' AND `dateTime` < '{$endTime}' GROUP BY `repeatTimes`";
    try{
        return $dbo->loadAssocList($sql);
    }catch (Exception $e){
        echo "#Exception . getReportByDate： ".$e->getMessage().PHP_EOL;
        echo "#SQL : {$sql}".PHP_EOL;
        die();
    }
}

//自动检测当前页
function checkActive($active)
{
    if(@$_GET['a'] == $active){
        echo 'class="active"';
    }
}

//提示+跳转
//$info,内容
//url,可为空，填控制器名
function _location($info,$url='')
{
    echo '<script>alert("'.$info.'");</script>';
    if(!empty($url))
    {
        echo '<script>location.href="'.ROOT_URL.'?a='.$url.'"</script>';
    }else{
        echo '<script>history.go(-1);</script>';
    }
}