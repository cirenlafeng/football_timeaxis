<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/1/22
 * Time: 上午9:41
 */
set_time_limit(600);
//设定页面编码
header("Content-Type:text/html;charset=utf-8");
//设定时区
date_default_timezone_set('Africa/Cairo');

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL^E_NOTICE^E_WARNING);

//全局加载
include_once(dirname(__FILE__).'/../path.php');
include_once(HOST_PATH.'/conf/include.php');

defined('ADMIN_PATH') or define('ADMIN_PATH', dirname(__FILE__));
defined('STYLE_PATH') or define('STYLE_PATH', dirname($_SERVER['SCRIPT_NAME']).'/view/static/');
defined('ROOT_URL') or define('ROOT_URL', dirname($_SERVER['SCRIPT_NAME']).'/');
include_once(ADMIN_PATH . '/model/data.php');
include_once(ADMIN_PATH.'/control/login.php');