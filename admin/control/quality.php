<?php
    if(!$_GET['flag']){
        //获取域名
        $score = getList();
    }else{
        echo "<script>history.go(-1);</script>";
    }

    



