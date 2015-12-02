<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>准点参会排名</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
</head>
<body >
<div class="container-fluid "  style="margin-bottom:100px">
	<div class="row xjhy" style="height:70px;line-height:70px">
		<div class="col-xs-8 col-xs-offset-2"  style="line-height:70px;    text-align: center;">
			<span style="padding:12px;border:1px solid #dddddd;">准点参会排名</span>
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-3 col-xs-offset-1" style="padding:0;    text-align: center;">
			<select style='width:100%;'>
				<option style="width:10px">月份</option>
			</select>
		</div>
		<div class="col-xs-1" style="text-align:center">
			月
		</div>
		<div class="col-xs-7" style="padding:0;    text-align: center;">
			<span style="padding:7px 1px;;border:1px solid #dddddd;">迟到&缺席大王</span>
		</div>
	</div>
	<div class="row xjhy center" >
		<div class="col-xs-12 " >
			第一名 <span>神龙出世</span>
		</div>
		<div class="col-xs-12" >
			<span class="counttime">点击倒计时后3秒显示</span>
		</div>
    </div>
	<div class="row xjhy center" >
		<div class="col-xs-12 " >
			第二名 <span>华丽转身</span>
		</div>
		<div class="col-xs-12" >
			<span class="counttime">点击倒计时后2秒显示</span>
		</div>
    </div>
	<div class="row xjhy center" >
		<div class="col-xs-12 " >
			第三名 <span>闪亮登场</span>
		</div>
		<div class="col-xs-12" >
			<span class="counttime">点击倒计时后1秒显示</span>
		</div>
    </div>
	<div class="row boxName">
		<div class="col-xs-12" >
			<div class="row">
				<div class="col-xs-2 ">
					4
				</div>
				<div class="col-xs-3" >
					<img src="<?php echo base_url('img/banner.png');?>" >
				</div>
				<div class="col-xs-7" >
						名字 迟到+缺席总次数
				</div>
			</div>
		</div>
    </div>
	<div class="row boxName">
		<div class="col-xs-12" >
			<div class="row">
				<div class="col-xs-2 ">
					5
				</div>
				<div class="col-xs-3" >
					<img src="<?php echo base_url('img/banner.png');?>" >
				</div>
				<div class="col-xs-7" >
						名字 迟到+缺席总次数
				</div>
			</div>
		</div>
    </div>
</div>
</body>
</html>