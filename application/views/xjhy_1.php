<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>新建会议</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index1.css');?>">
</head>
<body >
<div class="container-fluid "  style="margin-bottom:70px">
	<div class="row meet1Tit ">
		特定部门
    </div>
	<div class="row meet_1" >
		<a href="<?php echo base_url('Meet/xjhy_2'); ?>"><div class="col-xs-2 meet_content1" >
			<img src="<?php echo base_url('img/addB.jpg'); ?>" >
		</div></a>
		<div class="col-xs-2 meet_content1" >
			<img src="<?php echo base_url('img/delB.png'); ?>" >
		</div>
		<div class="col-xs-2 meet_content1" >
			<img src="img/banner.png" >
			<p style="text-align:center">朱小君</p>
		</div>
		<div class="col-xs-2 meet_content1" >
			<img src="img/banner.png" >
			<p style="text-align:center">朱小君</p>
		</div>
		<div class="col-xs-2 meet_content1" >
			<img src="img/banner.png" >
			<p style="text-align:center">朱小君</p>
		</div>
		<div class="col-xs-2 meet_content1" >
			<img src="img/banner.png" >
			<p style="text-align:center">朱小君</p>
		</div>
		<div style="clear:both"></div>
	</div>
	<div class="row meet1Tit" >
		特定人员
    </div>
	<div class="row meet_1" >
		
		<a href="<?php echo base_url('Meet/xjhy_3'); ?>"><div class="col-xs-2 meet_content1" >
			<img src="<?php echo base_url('img/addB.jpg'); ?>" >
		</div></a>
		<div class="col-xs-2 meet_content1" >
			<img src="<?php echo base_url('img/dels.png'); ?>" >
		</div>
		<div class="col-xs-2 meet_content1" >
			<img src="img/banner.png" >
			<p style="text-align:center">朱小君</p>
		</div>
		<div class="col-xs-2 meet_content1" >
			<img src="img/banner.png" >
			<p style="text-align:center">朱小君</p>
		</div>
		<div style="clear:both"></div>
	</div>
</div>
<div class="newMeet_1" >
	<div class="bottomSpan" >
		<a href="javascript:history.go(-1)"><span>关闭</span></a>
		<span>确定</span>
	</div>
</div>
</body>
</html>