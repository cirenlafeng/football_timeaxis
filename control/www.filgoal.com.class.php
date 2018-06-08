<?php 
defined('HOST_PATH') or exit("contorl path error");
date_default_timezone_set('Africa/Cairo');
/*
*  改名规则
*  1、example 改为 域名，域名中的 ”.“ ”-“ 符号都替换成 ”_“
*  2、每个php文件需要修改这个方法名和下面的类名
*  3、搜索  记得改名  查找改名处
*
*  配置文件在页面底部，包括：
*  1、urlInfo        所有任务url数据
*  2、operatorID     负责人ID
*/

//记得改名
function www_filgoal_com_Funtion($result, $args)
{
	global $operatorID;
	$args['operatorID'] = $operatorID[$args['domain']];

	$CLASS = new www_filgoal_com();//记得改名
	// $result['info']['http_code'] 返回状态 , $result['content'] 返回页面内容
	// $args = ['url' => 'url','tag' => 17,'type' => 1,'diff' => 1,'operatorID'=>0];
	switch ($args['fun'])
	{
		case 'getUrl':
			//验证返回状态
		    if (getUrlHttpCodeCheck($result)) {
		    	$CLASS->getUrlList($result, $args);
		    }
			break;
		case 'getBody':
			//验证返回状态
		    if (getBodyHttpCodeCheck($result)) {
		    	$CLASS->getBodyInfo($result, $args);
		    }else{
		    	updateArticleHttpErrorCode($args['urlID'], $result['info']['http_code']);
		    }
			break;
		default:
			break;
	}
}

/**
* 记得改名
*/
class www_filgoal_com
{
	//抓取栏目所有新闻链接
	
	public function getUrlList($result, $args)
	{
		//基础数据
	   	$id = $args['id'];
	   	if(!$id)
	   	{
	   		echo "#######错误：未找到id".PHP_EOL;
	   		return false;
	   	}
		//处理内容页面：自己选择处理html和xml方法  newDocumentHTML  newDocumentXML[xml很多没有缩略图]
		phpQuery::newDocumentHTML($result['content']);//解析html

		
		//选择队列区块
		$articles = pq('ul.match-events-container')->html();
		if( strlen($articles) > 10 )
		{
			$content_times = strReplaceNT('<ul>'.$articles.'</ul>');
		}else{
			$content_times = '';
		}
		
		$battles = pq('div#mformation')->html();
		if( strlen($battles) > 10 )
		{
			$cleanA = pq('div#mformation')->find('#mfm_num');
			$cleanB = pq('div#mformation')->find('#mfm_pitch');
			if($cleanA)
			{
				$battles = str_replace($cleanA, '', $battles);
			}
			if($cleanB)
			{
				$battles = str_replace($cleanB, '', $battles);
			}
			$content_battle = strReplaceNT($battles);
		}else{
			$content_battle = '';
		}

		global $dbo;
		try{
			$dbo->exec("UPDATE `link_list` SET `content_times` = '{$content_times}' , `content_battle` = '{$content_battle}' WHERE `id` = {$id}");
			echo '#SUCCESS  ID: '.$id.' have saved!'.PHP_EOL;
		}catch (Exception $e)
		{
			echo '#####ERROR  ID: '.$id.' save error'.PHP_EOL;
		}

		phpQuery::unloadDocuments();
	}

	//这个文件基本不用动
	public function getBodyInfo($result, $args)
	{
		return true;
	}

	//处理具体正文内容title，time，content解析的方法html(),htmlOuter(),text()
	public function ResolveHtml($data)
	{
        return true;
	}
}



