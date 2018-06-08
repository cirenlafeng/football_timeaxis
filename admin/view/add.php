<script type="text/javascript" src="<?php echo ROOT_URL ?>jedate.js">
</script><link type="text/css" rel="stylesheet" href="<?php echo ROOT_URL ?>jedate.css" id="jeDateSkin">

<style>
.datep{ margin-bottom:40px;}
</style>

<div class="col-md-10">
    <div class="row">
        <div class="panel panel-default bootstrap-admin-no-table-panel">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Add competition</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                <form class="form-horizontal" action="<?php echo ROOT_URL.'?a=add'?>" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" >Competition ID</label>
                            <div class="col-lg-6">
                                <input name="id" class="form-control" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Main team name</label>
                            <div class="col-lg-6">
                                <input name="team_first" class="form-control" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Second team name</label>
                            <div class="col-lg-6">
                                <input name="team_second" class="form-control"  type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Collection URL</label>
                            <div class="col-lg-6">
                                <input name="url" class="form-control" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Start collecting time</label>
                            <div class="col-lg-6">
                                <input name="start_time" class="form-control " id="dateinfo" type="datetime"  readonly="" style="background-color: #fff;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">End collecting time</label>
                            <div class="col-lg-6">
                                <input name="end_time" class="form-control " id="dateinfo2" type="datetime"  readonly="" style="background-color: #fff;">
                            </div>
                        </div>
                        <br><br><br><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </label>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jeDate({
		dateCell:"#dateinfo",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	jeDate({
		dateCell:"#dateinfo2",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
</script><div id="jedatebox" class="jedatebox" style="z-index: 999;"></div>

