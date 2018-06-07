<?php 
set_time_limit(600);
//设定页面编码
header("Content-type:application/json;charset=utf-8");
//设定时区
date_default_timezone_set('Asia/Shanghai');
// error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
//全局加载
include_once(dirname(__FILE__).'/conf/include.php');

$id = $_GET['id'];
$info = [];
if(isset($id) && !empty($id))
{
	$info = $dbo->loadAssoc("SELECT * FROM `link_list` WHERE `id`='{$id}' ");
}
if(!$info)
{
	$info = [];
}
echo json_encode($info);
