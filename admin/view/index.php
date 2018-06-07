                <div class="col-md-10">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="bootstrap-admin-box-title"><a href="<?php echo ROOT_URL.'?a=add';?>">添加比赛</a></div>
                            </div>
                            <div class="bootstrap-admin-panel-content">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>主队</th>
                                            <th>客队</th>
                                            <th>URL</th>
                                            <th>开始采集时间</th>
                                            <th>结束采集时间</th>
                                            <th>更多</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($list as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?php  echo $value['id'];?></td>
                                            <td><?php  echo $value['team_first'];?></td>
                                            <td><?php  echo $value['team_second'];?></td>
                                            <td><a href="<?php  echo $value['url'];?>" target="_blank">查看URL</a></td>
                                            <td><?php  echo date('Y-m-d H:i:s',$value['start_time']);?></td>
                                            <td><?php  echo date('Y-m-d H:i:s',$value['end_time']);?></td>
                                            <td><a href="<?php echo ROOT_URL.'?a=del&id='.$value['id'];?>" onclick="return confirm('确认要删除？')">删除</a></td>
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php  echo $p->showPages(2);?>
                            </div>
                        </div>
                    </div>
                </div>