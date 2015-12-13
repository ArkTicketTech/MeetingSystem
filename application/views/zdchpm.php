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
			<select style='width:100%;'  onchange="self.location.href=options[selectedIndex].value" >
				<option style="width:10px" value="<?php echo base_url('user/latest/');?>">全部月份</option>
				<?php
					for ($x=0; $x<=11; $x++){ 
				?>
				<option style="width:10px" value="<?php echo base_url('user/latest/').'/'.($x+1);?>" <?php if($month == $x+1) echo 'selected' ;?> ><?php echo $x+1;?>月</option>
				<?php
					}
				?>
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
			<img src="<?php echo base_url('img/1.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
			<img src="<?php echo base_url('img/2.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
			<img src="<?php echo base_url('img/3.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
		</div>
    </div>
	<div class="row xjhy center" >
		<div class="col-xs-12 " >
			第二名 <span>华丽转身</span>
		</div>
		<div class="col-xs-12" >
			<span class="counttime">点击倒计时后2秒显示</span>
			<img src="<?php echo base_url('img/1.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
			<img src="<?php echo base_url('img/2.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
			<img src="<?php echo base_url('img/3.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
			<img src="http://meet.com:8888/img/banner.png" style="height:40px;width:60%;display:none;margin-left:20%;">
		</div>
    </div>
	<div class="row xjhy center" >
		<div class="col-xs-12 " >
			第三名 <span>闪亮登场</span>
		</div>
		<div class="col-xs-12" >
			<span class="counttime">点击倒计时后1秒显示</span>
			<img src="<?php echo base_url('img/1.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
			<img src="<?php echo base_url('img/2.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
			<img src="<?php echo base_url('img/3.png');?>" style="height:40px;width:60%;display:none;margin-left:20%;">
		</div>
    </div>
    <?php 
    	$num = 0;
    	foreach ($list as $r) {
    		$num++;
    		if($num<=3){
    			continue;
    		}
    		if($r['ulatest']==0) break;
    ?>
	<div class="row boxName">
		<div class="col-xs-12" >
			<div class="row">
				<div class="col-xs-2 ">
					<?php echo $num;?>
				</div>
				<div class="col-xs-3" >
					<img src="<?php echo base_url('img/banner.png');?>" >
				</div>
				<div class="col-xs-7" >
						<?php echo $r['uname']?> 迟到/缺席<?php echo $r['ulatest']?>次
				</div>
			</div>
		</div>
    </div>
	<?php
		}
	?>
</div>
</body>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('.center').eq(0).children('div').bind("click",function(){
			$('.center').eq(0).children('div').eq(1).children('span').css("display","none");
			$('.center').eq(0).children('div').eq(1).children('img').eq(2).css("display","block");
			setTimeout(function () { 
				$('.center').eq(0).children('div').eq(1).children('img').css("display","none");
	        	
	        	$('.center').eq(0).children('div').eq(1).children('img').eq(1).css("display","block");
	   	 	}, 1000);
	   	 	setTimeout(function () { 
	   	 		$('.center').eq(0).children('div').eq(1).children('img').css("display","none");
	        	
	        	$('.center').eq(0).children('div').eq(1).children('img').eq(0).css("display","block");
	   	 	}, 2000);
			setTimeout(function () { 
	        	$('.center').eq(0).children('div').eq(1).children('img').css("display","none");
	        	$('.center').eq(0).children('div').eq(1).children('span').css("display","inline");
				$('.center').eq(0).children('div').eq(1).children('span').html("<?php echo $list[0]['uname']?> 迟到/缺席<?php echo $list[0]['ulatest']?>次");

	   	 	}, 3000);
		});

		$('.center').eq(1).children('div').bind("click",function(){
			$('.center').eq(1).children('div').eq(1).children('span').css("display","none");
			$('.center').eq(1).children('div').eq(1).children('img').eq(1).css("display","block");
	   	 	setTimeout(function () { 
	   	 		$('.center').eq(1).children('div').eq(1).children('img').css("display","none");
	        	
	        	$('.center').eq(1).children('div').eq(1).children('img').eq(0).css("display","block");
	   	 	}, 1000);
			setTimeout(function () { 
	        	$('.center').eq(1).children('div').eq(1).children('img').css("display","none");
	        	$('.center').eq(1).children('div').eq(1).children('span').css("display","inline");
				$('.center').eq(1).children('div').eq(1).children('span').html("<?php echo $list[1]['uname']?> 迟到/缺席<?php echo $list[1]['ulatest']?>次");
	   	 	}, 2000);
		});

		$('.center').eq(2).children('div').bind("click",function(){
			$('.center').eq(2).children('div').eq(1).children('span').css("display","none");
			$('.center').eq(2).children('div').eq(1).children('img').eq(0).css("display","block");
			setTimeout(function () { 
	        	$('.center').eq(2).children('div').eq(1).children('img').css("display","none");
	        	$('.center').eq(2).children('div').eq(1).children('span').css("display","inline");
				$('.center').eq(2).children('div').eq(1).children('span').html("<?php echo $list[2]['uname']?> 迟到/缺席<?php echo $list[2]['ulatest']?>次");
	   	 	}, 1000);
		});

			
	});
</script>
</html>