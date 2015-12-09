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
	<form method="post" class="form" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url('meet/create_post');?>"> 
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
			<input name="mplanbt" data-field="datetime" placeholder="请选择日期" value="<?php echo (empty($list[0])?'':$list[0]['mplanbt'])?>">
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
		<div class="col-xs-8" style="background-color:#f0f0f3;height:49px;padding-right:0;color:#2a2a2a">
			附件（0）
		</div>
		<div class="col-xs-4 add" >
			<span style="font-size:20px;line-height: 27px;" onclick = "upload1()">+</span>上传
			<input id="File" type="file" name="userfile" style="display:none" onchange="alert(123)"/>
			<input id="Filename" name="mfilename" style="display:none;"/>
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
		<span>保存为草稿</span>
		<span>立即提交</span>
	</div>
	<div class="bottomTxt" >
				如果你还没有确定现在立即发布，可以保存为草稿，之后可以再次编辑
	</div>
</div>
</body>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('css/datetime/DateTimePicker.js')?>"></script>
<script>
function upload1(){
	$("#File").click();
}
$(document).ready(function(){
	var path = "";
	var pos1 = "";
	var pos2 = "";
	function upload2(){
			path = $("#File").val();
			pos1 = path.split('/');
			pos2 = path.split('\\');
			if(pos1.length>0){
				pos = pos1[pos1.length-1];
			}
			if(pos2.length>0){
				pos = pos2[pos2.length-1];
			}
			$("#Filename").val(pos);
	}
	$(".bottomSpan").children().eq(1).click(function(){
		if($(".form_remind").val()=="") $(".form_remind").val(30);
		upload2();
		$('form').attr("action", "<?php echo base_url('meet/create_post/1');?>").submit();
		//window.document.location="<?php echo base_url('meet/stay');?>";

	});
	$(".bottomSpan").children().eq(0).click(function(){
		if($(".form_remind").val()=="") $(".form_remind").val(30);
		upload2();
		$('form').attr("action", "<?php echo base_url('meet/create_post/0');?>").submit();
		//window.document.location="<?php echo base_url('meet/draft/');?>";

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