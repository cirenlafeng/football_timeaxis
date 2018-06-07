<?php 
/**
*	获取当tian除外的一周所有信息集合
*/
function funWeekInfo(){

        global $dbo;

        $stime = mktime(0,0,0,date('m'),date('d'),date('Y'));

        $first = $stime-(86400*7);
        $first = date("Y-m-d",$first);
        
        $end = $stime-86400;
        $end  = date("Y-m-d",$end );

        $sql = "SELECT date,data FROM articles_analytics WHERE date>='{$first}' AND date<='{$end}'";
        $info = $dbo->loadAssocList($sql);     
        
        return $info;
}

function funDayInfo($stime){

        global $dbo;

        $nowday  = date("Y-m-d",$stime);
        $sql = "SELECT date,data FROM articles_analytics WHERE date='{$nowday}'";
        $info = $dbo->loadAssocList($sql);     
        return $info;
}
