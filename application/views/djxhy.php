<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>待进行会议</title>
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
			$path = base_url('meet/mydetail').'/'.$r['mid'];
	?>

		<div class="row meetSh" >
			<div onclick="javascript:window.location.href='<?php echo $path;?>'">
				<div class="col-xs-2" >
					<span class="circle" >
						<i></i>
					</span>
				</div>
				<div class="col-xs-9" >
					<div class="row meetTitle" >
						<?php echo $r['mname'];?>
					</div>
					<div class="row meetTime"  >
						地点
						<span><?php echo $r['rname'];?></span>
					</div>
		           <div class="row meetTime"  >
						时间
						<span><?php echo date('Y-m-d H:i',strtotime($r['mplanbt']));?>至<?php echo date('Y-m-d H:i',strtotime($r['mplanet']));?></span>
					</div>
				</div>
			</div>
	    </div>
	    
	<?php
    	}
    ?>
	<span class="nomore">已没有更多</span>
</div>
</body>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('.serach span').bind("click",function(){
			location.href ="<?php echo base_url('meet/stay')?>"+"/"+$('.serach input').val();
		});
	});
</script>
</html>