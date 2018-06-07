<?php

$id = $_GET['id'];
if(isset($id))
{
	$dbo->exec("DELETE FROM `link_list` WHERE id='{$id}' ");
	_location("成功",'index');
	exit();
}else{
	_location("异常操作",'index');
	exit();
}