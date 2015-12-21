<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>新建会议</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index1.css');?>">
</head>
<body >
<div class="container-fluid "  style="margin-bottom:70px">
	<div class="row aff" >
		<div class="col-xs-1 ">
			<i class="wCheck all"></i>
		</div>
		全选
	</div>
	
	<?php foreach ($departments as $v) {
	?>
		<div class="row aff" >
		<div class="col-xs-1 ">
			<i class="wCheck wCheckSelect"></i>
		</div>
		<img src="../img/head.jpg" style="height:40px;width:40px;position:relative">
		<?php echo $v['name']  ?>
		</div>
	<?php
	}
	?>
	
</div>
<div class="newMeet_1" >
	<div class="newMeetSpan" >
		<a href="javascript:history.go(-1)"><span>关闭</span></a>
		<span>确定（0）</span>
	</div>
</div>
<script src="<?php echo base_url('js/zepto.js'); ?>"></script>
<script>
Zepto(function($){
  $(".wCheck").on("click",function(){
	window.setTimeout(function(){
		$(this).toggleClass("wCheckSelect")
	},100)
	if($(this).hasClass("all") && !$(this).hasClass("wCheckSelect")){
		$(".wCheck").addClass("wCheckSelect")
	}else{
		$(".wCheck").removeClass("wCheckSelect")
	}
  })
})
</script>
</body>
</html>