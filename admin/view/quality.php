
                        <div class="col-md-6" style="width:930px;">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">采集质量评分</div>
                                    <div class="pull-right"><span class="badge">质量评分站点共 <b style='color:red;'><?php echo $num; ?></b> 个</span></div>
                                </div>
                                <div class="bootstrap-admin-panel-content" style="width:900px;">
                                    <table class="table table-striped">
                                        <captiop>7日内的数据参考评分, 本周内采集成功共（<b style="color:red;"><?php echo $sum;?></b>）条</captiop>
                                        <thead>
                                            <tr>
                                                <th>编号</th>
                                                <th>域名</th>
                                                <th>一周内更新</th>
                                                <th>站点采集评分</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($score as $k=>$v){ $a++?>
                                            <tr>
                                                <td><?php echo $a;?></td>
                                                <td><?php echo $k;?></td>
                                                <td><?php echo empty($v['count']) ? 0 : $v['count']; ?></td>
                                                <td><b style="color:green;">
                                                    <?php
                                                     switch($v['score']){
                                                         case 1:
                                                             echo '<b style="color:red;">较差</b>';
                                                         break;
                                                         case 2:
                                                             echo '<b style="color:orange;">一般</p>';
                                                         break;
                                                         case 3:
                                                             echo '<b style="color:blue;">优秀</b>';
                                                         break;
                                                         case 4:
                                                             echo '<b style="color:green;">精品</b>';
                                                         break;
                                                         default:
                                                             echo '<b style="color:purple;">0采集</b>';
                                                         break;
                                                     }
                                                     
                                                    ?>
                                                    </b></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        