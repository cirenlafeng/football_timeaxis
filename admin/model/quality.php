<?php 
include_once('fun.php');
    $sum = 0;#一周内更新数据
    $num = 0;#采集站点
    function getList(){

        global $dbo;
        //获取域名
        global $urlInfo;

        $weekinfo = funWeekInfo();
        $arr = array();
        $domain = array();
        foreach($weekinfo as $k=>$v){
                $arr = (unserialize($v['data']));
                ksort($arr['success']['tag']);
                $domain[] = $arr['success']['domain'];
                
        }
        //获取前七日数据评分
        $list = array();
        global $sum;
        global $num;
        foreach ($urlInfo as $key => $v) {
             $check_99 = 1;
            //weight=99过滤
            foreach ($v as $urlkey => $urlvalue) {
                if($urlvalue['weight']==1)
                {
                    $check_99 = 0;
                }
            }
            if($check_99)
            {
                continue;
            }
            $num++;
            $arr = array();
            $infonum = 0;
            foreach($domain as $k=>$val){
               $sum +=$val[$key];
                    $infonum  += $val[$key];
                    //制定评分区间
                   switch($infonum){
                       case 0:
                           $arr['score'] = 0;
                       break;
                       case $infonum >0 and $infonum <=70:
                           $arr['score'] = 1;
                       break;
                       case $infonum >70 and $infonum <=350:
                           $arr['score'] = 2;
                       break;
                       case $infonum >350 and $infonum <=700:
                           $arr['score'] = 3;
                       break;
                       case $infonum >700:
                           $arr['score'] = 4;
                       break;
   
                   }
                
               $arr['count'] = $infonum;
                  
                
            }

            $list[$key] = $arr;
        }  

        if($list){
           $list = multi_array_sort($list,'count'); 
        }
        return $list;
    }
    //多维数组指定键名排序
        function multi_array_sort($multi_array,$sort_key,$sort=SORT_DESC){ 
        if(is_array($multi_array)){ 
        foreach ($multi_array as $row_array){ 
        if(is_array($row_array)){ 
        $key_array[] = $row_array[$sort_key]; 
        }else{ 
        return false; 
        } 
        } 
        }else{ 
        return false; 
        } 
        array_multisort($key_array,$sort,$multi_array); 
        return $multi_array; 
        } 



