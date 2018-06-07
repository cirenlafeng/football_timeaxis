<?php
/**
 * Created by PhpStorm.
 * User: david/Sean.cai
 * Date: 2017/1/22
 * Time: 上午9:41
 */

function getDatasDate($data)
{
    $temp = [];
    $date = [];
    foreach ($data as $value)
    {
        if (!isset($temp[$value['date']]))
        {
            $temp[$value['date']] = true;
            $date[]['date'] = $value['date'];
        }
    }
    sort($date);
    return $date;
}
function getNewAlertNum()
{
    // global $dbo;
    // $time = strtotime(date('Y-m-d'));
    // return $dbo->getOne("SELECT count(1) count FROM alert_log WHERE add_time >= {$time}");
}

$searchDate = date('Y-m-d');
if (isset($_POST['date']))
{
    $searchDate = $_POST['date'];
}
if (!isset($_GET['a'])) $_GET['a'] = 'index';
include_once(ADMIN_PATH.'/view/header.php');
include_once(ADMIN_PATH.'/view/nav.php');
$action = $_GET['a'];
$title = "'{$action} Data Trend'";
$subtitle = "'Source: {$_SERVER['HTTP_HOST']} '";
@include_once(ADMIN_PATH . '/model/'.$action.'.php');
include_once(ADMIN_PATH . '/control/'.$action.'.php');
include_once(ADMIN_PATH . '/view/'.$action.'.php');
include_once(ADMIN_PATH.'/view/footer.php');