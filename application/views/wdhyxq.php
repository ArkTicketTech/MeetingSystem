<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>我的会议详情</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
</head>
<body >
<div class="container-fluid "  style="margin-bottom:60px;    overflow: hidden;">
	<div class="row meetSt" >
		<div class="col-xs-2" >
			<img src="<?php echo base_url('img/banner.png');?>" class="tstImg" style="margin-top:0">
		</div>
		<div class="col-xs-5" >
			<div class="row meetTitle" >
				<?php echo $list[0]['uname']?><i></i>
			</div>
			<div class="row meetTime"  >
				2015-11-22 11:08:51
			</div>
		</div>
		<div class="col-xs-5" >
			<span class="copy" id="start" >会议开始</span>
			<span class="copy" id="end" >会议结束</span>
			<span class="summary" style="background-color:#fc6100;width:30%">修改</span>
		</div>
    </div>
   <div class="row xjhy" >
		<div class="col-xs-12" >
			<?php echo $list[0]['mname']?>
		</div>
    </div>
	<div class="row testCont" style="height:280px">
		<div class="col-xs-12" >
			<?php echo $list[0]['mname']?>
		</div>
		<div class="col-xs-12" >
			地点:<span><?php echo $list[0]['rname']?></span>
		</div>
		<div class="col-xs-12" style="color:#ed710c">
			<i></i>会议开始时间：<?php echo $list[0]['mplanbt']?>
		</div>
		<div class="col-xs-12" style="color:#ed710c">
			<i></i>会议结束时间：<?php echo $list[0]['mplanet']?>
		</div>
		<div class="col-xs-6" style="color:#ed710c">
			<img src="<?php echo base_url('img/banner.png');?>" style="height:90px;width:90px">
		</div>
		<div class="col-xs-5" >
			<?php 
				echo ($list[0]['mchecktype']) ? '<p  class="sign">扫码签到</p>' : '<p  class="sign">定位签到</p>';
			?>
		</div>
		<div class="col-xs-12" >
			<div class="row num" >
				<span class="col-xs-4" >参加（0人）</span>
				<span class="col-xs-4" >请假（0人）</span>
				<span class="col-xs-4" >未反馈（0人）</span>
			</div>
		</div>
		<div class="col-xs-6">
			<span class="sure">确认参加</span>
		</div>
		<div class="col-xs-6">		
			<span class="vacation">请假</span>
		</div>
    </div>
	<div class="row  xjhy" >
		<div class="col-xs-12 words"  >
			参与人（<?php echo count($members)?>）
		</div>
		<div class="col-xs-12" style="background-color:#fff">
			<div class="row">
				<?php 
				foreach($members as $row){
				?>
					<div class="col-xs-2" >
						<div class="row">
							<img src="<?php echo base_url('img/banner.png');?>" class="col-xs-12 tstImg">
							<p class="col-xs-12 tname"><?php echo $row['uname']?></p>
						</div>
					</div>
				<?php 
				}
				?>
			</div>
		</div>
    </div>
</div>
</body>
</html>