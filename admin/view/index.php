                <div class="col-md-10">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="bootstrap-admin-box-title"><a href="<?php echo ROOT_URL.'?a=add';?>">Add competition
</a></div>
                            </div>
                            <div class="bootstrap-admin-panel-content">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Main team</th>
                                            <th>Second team</th>
                                            <th>URL</th>
                                            <th>Start collecting time</th>
                                            <th>End collecting time</th>
                                            <th>More</th>
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
                                            <td><a href="<?php  echo $value['url'];?>" target="_blank">Show URL</a></td>
                                            <td><?php  echo date('Y-m-d H:i:s',$value['start_time']);?></td>
                                            <td><?php  echo date('Y-m-d H:i:s',$value['end_time']);?></td>
                                            <td><a href="<?php echo ROOT_URL.'?a=del&id='.$value['id'];?>" onclick="return confirm('confirm delete this？')">Delete</a></td>
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