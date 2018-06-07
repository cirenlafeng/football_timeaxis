<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/1/22
 * Time: 上午9:41
 */
session_start();

if (@$_GET['a'] == 'out')
{
    unset($_SESSION);
    session_unset();
    session_destroy();
    Header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/');die();
}

if (!isset($_SESSION['username']))
{
    if (isset($_POST['username']) && isset($_POST['password']))
    {
        if ($_POST['username'] == $sysConfig['admin']['user'] && $_POST['password'] == $sysConfig['admin']['pwd'])
        {
            ini_set('session.gc_maxlifetime',43200);//12小时
            $_SESSION['username'] = 'admin';
            include_once(ADMIN_PATH.'/control/report.php');
        }else{
            include_once (ADMIN_PATH.'/view/login.php');
            alertTips('登录失败！');
        }
    }else{
        include_once (ADMIN_PATH.'/view/login.php');
    }
}else{
    if ($_SESSION['username'] != $sysConfig['admin']['user'])
    {
        session_unset();
        session_destroy();
        include_once (ADMIN_PATH.'/view/login.php');
    }else{
        include_once(ADMIN_PATH.'/control/report.php');
    }
}

