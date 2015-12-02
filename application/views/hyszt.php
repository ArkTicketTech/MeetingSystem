<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>会议室状态</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
</head>
<body >
<div class="container-fluid " style="margin-bottom:60px">
	<?php
		foreach ($list as $r) {
	?>
	<div class="row meetSt" >
		<div class="col-xs-2" >
			<span class="circle" >
				<i></i>
			</span>
		</div>
		<div class="col-xs-9" >
			<div class="row meetTitle" >
				<?php echo $r['rname']?>
			</div>
			<div class="row meetTime"  >
				未来三小时
				<span>空闲</span>
			</div>
		</div>
		<div class="col-xs-1" >
			>
		</div>
    </div>
	<?php
    	}
    ?>
   
</div>
<div class="newS" style="height:60px">
 <div class="bottom" >
			新建会议
	</div>
</div>
</body>
</html>