<?php

if(isset($_SERVER['REQUEST_METHOD']) && !strcasecmp($_SERVER['REQUEST_METHOD'],'POST'))
{
	$data = $_POST;
	foreach ($data as $key => $value) {
		if(empty($value))
		{
			_location("内容不能为空",'add');
			exit();
		}
	}
	$starttime = strtotime($data['start_time']);
	$endtime = strtotime($data['end_time']);

	$dbo->exec("INSERT INTO `link_list` VALUES('{$data['id']}','{$data['team_first']}','{$data['team_second']}','{$data['url']}','{$starttime}','{$endtime}','','') ");
	_location("成功",'index');
	exit();
}