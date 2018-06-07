<div class="col-md-10">
	<div class="row">
    <div class="panel panel-default bootstrap-admin-no-table-panel">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">短信/邮箱 预警设置</div>
        </div>
        <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
<style>
    .form-control{
        width: 25%;
        float: left;
    }
    div.col-lg-3{
        width: 70%;
    }
    font.tabletitle{
        width: 25%;
        float: left;
        font-weight: bold;
    }
</style>
            <form class="form-horizontal" action="?a=setalert" method="post" onsubmit='return check();'>
                <fieldset>
                    <legend>总开关</legend>
                    <!-- 短信开关开始 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="sms" style="padding-top: 2px;">开启短信</label>
                        <div class="col-lg-10">
                            <label class="uniform">
                                <input class="uniform_on" name='sms' <?php ischecked('sms');?> type="checkbox" id="sms" value="1">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">接收号码</label>
                        <div class="col-lg-3">
                            <input class="form-control" name='sms_num' id="sms_num" type="text" value="<?php echo $data['sms_num'];?>" placeholder="未勾选时可留空">
                        </div>
                    </div>
                    <!-- 短信开关结束 -->

                    <!-- 邮件开关开始 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="email" style="padding-top: 2px;">开启邮箱</label>
                        <div class="col-lg-10">
                            <label class="uniform">
                                <input class="uniform_on" name='email' <?php ischecked('email');?> type="checkbox" id="email" value="1">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">接收邮箱</label>
                        <div class="col-lg-3">
                            <input class="form-control" name='email_num' id="focusedInput" type="text" value="<?php echo $data['email_num'];?>" placeholder="未勾选时可留空">
                        </div>
                    </div>
                    <!-- 邮件开关结束 -->

                    
                    <!-- 大量错误预警开关开始 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="bigerror" style="padding-top: 2px;">规则开关</label>
                        <div class="col-lg-10">
                            <label class="uniform">
                                <input class="uniform_on" name='bigerror' <?php ischecked('bigerror');?> type="checkbox" id="bigerror" value="1">
                            </label>
                            <label><span style='color: #999;font-size: 12px;'>(如果关闭，则下方规则全部关闭)</span></label>
                        </div>
                    </div>
                    <!-- 大量错误预警开关结束 -->
                    <br />
                    <legend>预警规则 <span style="font-size: 12px;">(阈值为0则不开启，请填写正整数。前推时间：以多少分钟前开始。时间单位：分钟)</span></legend>
                    <!-- 表头 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;"></label>
                        <div class="col-lg-3">
                            <font class='tabletitle'>阈值</font>
                            <font class='tabletitle'>时间段</font>
                            <font class='tabletitle'>前推时间</font>
                        </div>
                    </div>
                    <!-- 表头 END -->
                    <!-- 昨日0采集 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">单日0采集域名</label>
                        <div class="col-lg-3">
                            <input class="form-control" name='no_data' type="text" value="<?php echo $data['no_data'];?>" placeholder="填写正整数">
                            <input class="form-control" name='no_data_time' type="text" value="<?php echo $data['no_data_time'];?>" placeholder="填写正整数" readonly >
                            <input class="form-control" name='no_data_timeago' type="text" value="<?php echo $data['no_data_timeago'];?>" placeholder="填写正整数">
                        </div>
                    </div>
                    <!-- 昨日0采集END -->
                    <!-- PUSH API ERROR -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">PUSH API ERROR</label>
                        <div class="col-lg-3">
                            <input class="form-control" name='push' type="text" value="<?php echo $data['push'];?>" placeholder="填写正整数">
                            <input class="form-control" name='push_time' type="text" value="<?php echo $data['push_time'];?>" placeholder="填写正整数" readonly >
                            <input class="form-control" name='push_timeago' type="text" value="<?php echo $data['push_timeago'];?>" placeholder="填写正整数" readonly >
                        </div>
                    </div>
                    <!-- PUSH API ERROR END -->
                    <!-- 标题为空 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">标题为空</label>
                        <div class="col-lg-3">
                            <input class="form-control" name='title' type="text" value="<?php echo $data['title'];?>" placeholder="填写正整数">
                            <input class="form-control" name='title_time' type="text" value="<?php echo $data['title_time'];?>" placeholder="填写正整数">
                            <input class="form-control" name='title_timeago' type="text" value="<?php echo $data['title_timeago'];?>" placeholder="填写正整数">
                        </div>
                    </div>
                    <!-- 标题为空 END -->
                    <!-- 内容为空 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">内容为空</label>
                        <div class="col-lg-3">
                            <input class="form-control" name='content' type="text" value="<?php echo $data['content'];?>" placeholder="填写正整数">
                            <input class="form-control" name='content_time' type="text" value="<?php echo $data['content_time'];?>" placeholder="填写正整数">
                            <input class="form-control" name='content_timeago' type="text" value="<?php echo $data['content_timeago'];?>" placeholder="填写正整数">
                        </div>
                    </div>
                    <!-- 内容为空 END -->
                    <!-- 状态不为3 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">状态不为3</label>
                        <div class="col-lg-3">
                            <input class="form-control" name='status3' type="text" value="<?php echo $data['status3'];?>" placeholder="填写正整数">
                            <input class="form-control" name='status3_time' type="text" value="<?php echo $data['status3_time'];?>" placeholder="填写正整数">
                            <input class="form-control" name='status3_timeago' type="text" value="<?php echo $data['status3_timeago'];?>" placeholder="填写正整数">
                        </div>
                    </div>
                    <!-- 状态不为3 END -->
                    <!-- 标题异常 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">标题异常<br />
                        <font style='font-size: 10px;'>(400/404/503等)</font>
                        </label>
                        <div class="col-lg-3">
                            <input class="form-control" name='title400' type="text" value="<?php echo $data['title400'];?>" placeholder="填写正整数">
                        <input class="form-control" name='title400_time' type="text" value="<?php echo $data['title400_time'];?>" placeholder="填写正整数">
                            <input class="form-control" name='title400_timeago' type="text" value="<?php echo $data['title400_timeago'];?>" placeholder="填写正整数">
                        </div>
                    </div>
                    <!-- 标题异常 END -->
                    <!-- 优秀站点0采集 -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"  style="padding-top: 2px;">前十站点采集量<br />
                        <font style='font-size: 9px;'>(判断标准：低于阈值则预警)</font>
                        </label>
                        <div class="col-lg-3">
                            <input class="form-control" name='excellent' type="text" value="<?php echo $data['excellent'];?>" placeholder="填写正整数">
                            <input class="form-control" name='excellent_time' type="text" value="<?php echo $data['excellent_time'];?>" placeholder="填写正整数">
                            <input class="form-control" name='excellent_timeago' type="text" value="<?php echo $data['excellent_timeago'];?>" placeholder="填写正整数">
                        </div>
                    </div>
                    <hr />
                    <!-- 优秀站点0采集 END -->
                    <input type='hidden' id='setalert' name='setalert' value='go_change' />
                    <button type="submit" class="btn btn-primary">保存设置</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo STYLE_PATH;?>js/jquery-2.0.3.min.js"></script>
<script>
function check(){
var result = [];
    $("input[type='checkbox']").each(function(){
        var boxName = this.name;
        var num = this.checked ? 1 : 0;
        result.push(boxName+'='+num);
    });
    $('#setalert').val(result.join());
    //alert($('#setalert').val());
}
</script>