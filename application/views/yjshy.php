<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>已结束会议</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
</head>
<body >
<div class="serach" >
	<input placeholder="搜索标题">
	<span></span>
</div> 
<div class="container-fluid " style="margin-top:50px">
		<?php
		foreach ($list as $r) {
			$path = base_url('meet/closedetail').'/'.$r['mid'];
		?>
			<div class="row meetSt" onclick="javascript:window.location.href='<?php echo $path;?>'">
				<div class="col-xs-3" >
					<img src="<?php echo base_url('img/banner.png');?>" class="meetImg">
				</div>
				<div class="col-xs-9" >
					<div class="row meetTitle" >
						<?php echo $r['uname']?><span ><?php echo $r['mplanet'];?></span>
					</div>
					<div class="row meetTime"  >
						<?php echo $r['mname']?>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	<span class="nomore">已没有更多</span>
</div>
</body>
</html>