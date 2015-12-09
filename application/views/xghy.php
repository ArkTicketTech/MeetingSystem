<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>新建会议</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/datetime/DateTimePicker.css')?>" />

</head>
<body >
<div class="container-fluid "  style="margin-bottom:100px">
	<form method="post" class="form" action="<?php echo base_url('meet/change_post').'/'.$list[0]['mid'];?>"> 
	<div class="row xjhy" >
		<div class="col-xs-3" >
			会议标题
		</div>
		<div class="col-xs-8" >
			<input name="mname" placeholder="请输入会议标题" value="<?php echo (empty($list[0])?'':$list[0]['mname'])?>">
		</div>
    </div>	
	<div class="row xjhy" >
		<div class="col-xs-3" >
			开始时间
		</div>
		<div class="col-xs-8" >
			<input class="form_delay" name="mdelay" placeholder="30" value="0" style="display:none;">
			<input class="form_begin" name="mplanbt" data-field="datetime" placeholder="请选择日期" value="<?php echo (empty($list[0])?'':$list[0]['mplanbt'])?>">
		</div>
    </div>
   <div class="row xjhy" >
		<div class="col-xs-3" >
			结束时间
		</div>
		<div class="col-xs-8" >
			<input name="mplanet" data-field="datetime" placeholder="请选择日期" value="<?php echo (empty($list[0])?'':$list[0]['mplanet'])?>">
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-3" >
			会议地点
		</div>
		<div class="col-xs-8" >
			<select name="mrid" value="<?php echo (empty($list[0])?'':$list[0]['mrid'])?>">
				<?php foreach ($rooms as $r) {
				?>
					<option value="<?php echo $r['rid']?>"><?php echo $r['rname']?></option>
				<?php
				}
				?>
			</select>
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-8" >
			会议开始前提醒时间（分钟）
		</div>
		<div class="col-xs-4" >
			<input class="form_remind" name="mremind" placeholder="30" value="<?php echo (empty($list[0])?'':$list[0]['mremind'])?>">
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-6" >
			二维码签到
		</div>
		<div class="col-xs-6 checkBtn" >
			<span class="left" ></span>
			<input style="display:none;" name="mchecktype" value="0"></input>
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-6" >
			是否为公司层会议
		</div>
		<div class="col-xs-6 checkBtn" >
			<span class="left" ></span>
			<input style="display:none;" name="mconfirm" value="0"></input>
		</div>
    </div>

	<div class="row xjhy" >
		<div class="col-xs-6" >
			会议部门
		</div>
		<div class="col-xs-6 " >
			<select name="mapartment">
				<?php foreach ($apartments as $r) {
				?>
					<option value="<?php echo $r['aid']?>"><?php echo $r['aname']?></option>
				<?php
				}
				?>
			</select>
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-6" >
			参与人
		</div>
		<div class="col-xs-6 " >
			<select>
				<option>已选择1人</option>
				<option>已选择2人</option>
				<option>已选择3人</option>
			</select>
		</div>
    </div>
	</form>
</div>
<div id="dtBox"></div>
<div class="newS" >
	<div class="bottomSpan" >
		<span style="width:96%;height:40px;background-color:#30cd2f;">完成修改</span>
	</div>
</div>
</body>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('css/datetime/DateTimePicker.js')?>"></script>

<script>
$(document).ready(function(){
	$(".bottomSpan").children().eq(0).click(function(){
		if($(".form_remind").val()=="") $(".form_remind").val(30);
		var datelast = new Date("<?php echo $list[0]['mplanbt'];?>");
		var datenew = new Date($(".form_begin").val());
		if(datenew>datelast) {$(".form_delay").val(1);}
		$('form').submit();
		//window.document.location="<?php echo base_url('meet/stay');?>";

	});
	$(".checkBtn").bind("click",function(){
		if($(this).children().eq(0).hasClass('left')){
			$(this).children().eq(0).removeClass('left').addClass('right');
			$(this).children().eq(1).val(1);
		}
		else{
			$(this).children().eq(0).removeClass('right').addClass('left');	
			$(this).children().eq(1).val(0);
		}
	});
	$("#dtBox").DateTimePicker({
		formatHumanDate: function(date)
		{
		    return date.day + ", " + date.month + " " + date.dd + ", " + date.yyyy;
		}
    });
});
</script>

</html>