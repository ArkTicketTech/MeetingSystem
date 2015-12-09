<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>会议审核及通知</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
</head>
<body >
<div class="container-fluid " style="margin-bottom:60px">
	<?php foreach($msgs as $msg){
		if(!$msg['mactet'])
			$url = base_url("meet/mydetail/")."/".$msg['mid'];
		if($msg['mactet'])
			$url = base_url("meet/closedetail/")."/".$msg['mid'];
	?>

	<div class="row meetSt" onclick="window.location.href='<?php echo $url;?>'">
		<div class="col-xs-9" >
			<div class="row meetTime"  >
				会议标题
				<span><?php echo $msg['mname']?></span>
			</div>
			<div class="row meetTime"  >
				通知事项
				<span>
					<?php 
						if($msg['msgtype'] == 1)
							echo "会议临时延期";
						if($msg['msgtype'] == 2)
							echo "会议取消";
						if($msg['msgtype'] == 3)
							echo "参会人请假";
					?>
				</span>
			</div>
			<div class="row meetTime"  >
				通知时间
				<span><?php echo $msg['msgtime']?></span>
			</div>
        </div>
		<div class="col-xs-1" >
			
		</div>
    </div>
    <?php 
	}
	?>
</div>

</body>
</html>