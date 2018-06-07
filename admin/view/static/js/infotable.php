<style>
    .pagination p{
        border:1px solid #ccc;
        margin:10px;
        float:left;
    }
    .pagination a{
        border:1px solid #ccc;
        margin:10px;
        float:left;
    }
    #page{
        width:800px;
    }
    
</style>
                        <div class="col-md-6" style="width:930px;">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">新闻信息</div>
                                    <div class="pull-right"><span class="badge">采集站点共 <b style='color:red;'><?php echo count($list) ?></b> 个</span></div>;
                                </div>

                                <div class="bootstrap-admin-panel-content" style="width:900px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>编号</th>
                                                <th>域名</th>                  
                                                <th><?php echo date('m-d',time()-(7*86400))?></th>
                                                <th><?php echo date('m-d',time()-(6*86400))?></th>
                                                <th><?php echo date('m-d',time()-(5*86400))?></th>
                                                <th><?php echo date('m-d',time()-(4*86400))?></th>
                                                <th><?php echo date('m-d',time()-(3*86400))?></th>
                                                <th><?php echo date('m-d',time()-(2*86400))?></th>
                                                <th><?php echo date('m-d',time()-86400)?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($list as $k=>$v){  $a++;?>
                                            <tr>
                        
                                            <th><?php echo $a;?></th>
                                            <th><?php echo $k;?></th>
                                            <td>
                                                <?php 
                                                    if(empty($list[$k][0]['count']) || $list[$k][0]['count'] == 0){
                                                        echo "<b style='color:red;'>0</b>";
                                                    }elseif ($list[$k][0]['count'] > 0 && $list[$k][0]['count'] < 10){
                                                        echo "<b style='color:blue;'>".$list[$k][0]['count']."</b>";
                                                    }else{
                                                        echo $list[$k][0]['count'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if(empty($list[$k][1]['count']) || $list[$k][1]['count'] == 0){
                                                        echo "<b style='color:red;'>0</b>";
                                                    }elseif ($list[$k][1]['count'] > 0 && $list[$k][1]['count'] < 10){
                                                        echo "<b style='color:blue;'>".$list[$k][1]['count']."</b>";
                                                    }else{
                                                        echo $list[$k][1]['count'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if(empty($list[$k][2]['count']) || $list[$k][2]['count'] == 0){
                                                        echo "<b style='color:red;'>0</b>";
                                                    }elseif ($list[$k][2]['count'] > 0 && $list[$k][2]['count'] < 10){
                                                        echo "<b style='color:blue;'>".$list[$k][2]['count']."</b>";
                                                    }else{
                                                        echo $list[$k][2]['count'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if(empty($list[$k][3]['count']) || $list[$k][3]['count'] == 0){
                                                        echo "<b style='color:red;'>0</b>";
                                                    }elseif ($list[$k][3]['count'] > 0 && $list[$k][3]['count'] < 10){
                                                        echo "<b style='color:blue;'>".$list[$k][3]['count']."</b>";
                                                    }else{
                                                        echo $list[$k][3]['count'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if(empty($list[$k][4]['count']) || $list[$k][4]['count'] == 0){
                                                        echo "<b style='color:red;'>0</b>";
                                                    }elseif ($list[$k][4]['count'] > 0 && $list[$k][4]['count'] < 10){
                                                        echo "<b style='color:blue;'>".$list[$k][4]['count']."</b>";
                                                    }else{
                                                        echo $list[$k][4]['count'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if(empty($list[$k][5]['count']) || $list[$k][5]['count'] == 0){
                                                        echo "<b style='color:red;'>0</b>";
                                                    }elseif ($list[$k][5]['count'] > 0 && $list[$k][5]['count'] < 10){
                                                        echo "<b style='color:blue;'>".$list[$k][5]['count']."</b>";
                                                    }else{
                                                        echo $list[$k][5]['count'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if(empty($list[$k][6]['count']) || $list[$k][6]['count'] == 0){
                                                        echo "<b style='color:red;'>0</b>";
                                                    }elseif ($list[$k][6]['count'] > 0 && $list[$k][6]['count'] < 10){
                                                        echo "<b style='color:blue;'>".$list[$k][6]['count']."</b>";
                                                    }else{
                                                        echo $list[$k][6]['count'];
                                                    }
                                                ?>
                                            </td>
          
                                                <td><a href='<?php echo ROOT_URL.'?a=infotable_detail&url='.$k;?>'>查看当天详情</a></td>
                  
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                
                                </div>
                            </div>
                        </div>
                        