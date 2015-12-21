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

<div class="serach" >
	<input placeholder="输入【姓名\拼音\手机号】搜索">
	<span id="letter"></span>
</div> 
<div id="mask" style="display:none">
	<span >A</span>
	<span >B</span>
	<span >C</span>
	<span >D</span>
	<span >E</span>
	<span >F</span>
	<span >G</span>
	<span >H</span>
	<span >I</span>
	<span >J</span>
	<span >K</span>
	<span >L</span>
	<span >M</span>
	<span >N</span>
	<span >O</span>
	<span >P</span>
	<span >Q</span>
	<span >R</span>
	<span >S</span>
	<span >T</span>
	<span >U</span>
	<span >V</span>
	<span >W</span>
	<span >X</span>
	<span >Y</span>
	<span >Z</span>
	<span >*</span>
</div>
<div class="container-fluid "  style="margin-bottom:70px;margin-top:50px">
	<div class="row aff" >
		<div class="col-xs-1 ">
			<i class="wCheck all"></i>
		</div>
		全选
		<span class="choose col-xs-offset-5" style="">按组织选人</span>
	</div>
	<div class="row meet1Tit" id="publicGroup">
		公共群组（10）
		<span class="down"></span>
    </div>
	<div id="group" style="display:none">
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
	<div class="row meet1Tit" >
		常用联系人群组
		<span class="up"></span>
    </div>
	<div class="row meet1Tit" >
		常用联系人
		<span class="up"></span>
    </div>
    
    
    <?php foreach ($users['userlist'] as $k => $v) {
	?>
		<?php 
		if($k == 0 || $v['letter'] != $users['userlist'][$k-1]['letter']){ ?>
		<div class="row meet1Tit" >
			<?php echo $v['letter']  ?>
	    </div>
	   <?php } ?>
	   <div class="row aff" >
		<div class="col-xs-1 ">
			<i class="wCheck wCheckSelect"></i>
		</div>
		<img src="<?php if(isset($v['avatar'])){echo $v['avatar'];}?>" style="height:40px;width:40px;position:relative">
			<?php echo $v['name']  ?>
		</div>
	   
	<?php
	}
	?>
    
</div>
<div class="newMeet_1" >
	<div class="newMeetSpan" >
		<a href="javascript:history.go(-1)"><span>关闭</span></a>
		<span>确定0人</span>
	</div>
</div>
<script src="<?php echo base_url('js/zepto.js'); ?>"></script>
<script>
Zepto(function($){
  $("#publicGroup").on("click",function(){
	$("#group").toggle()
  })
  $("#letter").on("click",function(){
	$("#mask").toggle()
  })
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