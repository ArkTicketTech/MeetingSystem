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
			<span class="copy" id="start" style="<?php echo ($list[0]['mactbt']) ? 'display:none;':'' ?>">会议开始</span>
			<span class="copy" id="end" style="<?php echo ($list[0]['mactbt']) ? '':'display:none;' ?>">会议结束</span>
			<?php $temppath = base_url("meet/meetchange/").'/'.$list[0]['mid']; ?>
			<span class="summary" style="background-color:#fc6100;width:30%" onclick="window.location.href='<?php echo $temppath?>'">修改</span>
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
				echo ($list[0]['mchecktype']) ? '<p  class="sign" onclick="check()">扫码签到</p>' : '<p  class="sign" onclick="check()">定位签到</p>';
			?>
		</div>
		<?php 			
			$attend = 0;
			$leave = 0;
			$unknown = 0;
			if(count($members)){
				foreach ($members as $mem) {
				    if($mem['mmleave'] == 0){
				    	if($mem['mmattend'])
				    		$attend++;
				    	else
				    		$unknown++;
				    }
				    else{
				    	$leave++;
				    }
				}
			}
		?>
		<div class="col-xs-12" >
			<div class="row num" >
				<span class="col-xs-4" >参加（<?php echo $attend;?>人）</span>
				<span class="col-xs-4" >请假（<?php echo $leave;?>人）</span>
				<span class="col-xs-4" >未反馈（<?php echo $unknown;?>人）</span>
			</div>
		</div>
		<div class="col-xs-6">
			<span class="sure" onclick="attend()">确认参加</span>
		</div>
		<div class="col-xs-6">		
			<span class="vacation" onclick="leave()">请假</span>
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
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script>
	
$(document).ready(function(){
	$("#start").bind("click",function(){
		$.post(
			"<?php echo base_url('ajax/meetstart').'/'.$list[0]['mid'];?>",
			function(){
				$("#start").css("display","none");
				$("#end").css("display","inline");
			}
		);
	});
	$("#end").bind("click",function(){
		$.post(
			"<?php echo base_url('ajax/meetend').'/'.$list[0]['mid'];?>",
			function(){
				$('#end').unbind("click");
				$("#end").css("display","inline");
			}
		);
	});
});

function check(){
		$.post(
			"<?php echo base_url('ajax/checkin').'/'.$list[0]['mid'];?>",
			function(){
				alert("签到成功!");
				$(".sign").css("display","none");
			}
		);
}

function attend(){
		$.post(
			"<?php echo base_url('ajax/attend').'/'.$list[0]['mid'];?>",
			function(){
				alert("已确认参加!");
				$(".sign").css("display","none");
				location.reload();
			}
		);
}
function leave(){
		$.post(
			"<?php echo base_url('ajax/leave').'/'.$list[0]['mid'];?>",
			function(){
				alert("请假成功!");
				$(".sign").css("display","none");
				location.reload();
			}
		);
}
</script>
</html>