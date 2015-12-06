<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>点击评分</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
</head>
<body >
<div class="container-fluid "  style="margin-bottom:100px">
	<div class="row xjhy" style="border:none">
		<div class="col-xs-5" >
			<?php echo $list[0]['mname'];?>会议评分为
		</div>
		<div class="col-xs-4" >
			<?php echo $list[0]['mscore'];?>
		</div>
		<div class="col-xs-3" >
			分
		</div>
		<?php
			$absentnum=0;
        	$latenum=0;
			if(count($members)){
	                foreach ($members as $mem) {
	                    if($mem['mmchecked'] == 0)
	                        $absentnum++;
	                    if($mem['mmchecked'] && ($mem['mmchecktime'] > $list[0]['mplanbt']) )
	                        $latenum++;
	                }
	        }
	        $minb = (strtotime($list[0]['mactbt'])-strtotime($list[0]['mplanbt']))/60;
        	$mine = (strtotime($list[0]['mactet'])-strtotime($list[0]['mplanet']))/60;
        	if($minb<=0) {$minb="正点开始";}
        	if($minb>0) {$minb="延迟". number_format($minb)."分钟开始";}
        	if($mine<=0) {$mine="正点结束";}
        	if($mine>0) {$mine="延迟".number_format($mine)."分钟结束";}
		?>
		
		
    </div>
	<div class="row xjhy" style="border:none">
		<div class="col-xs-7 col-xs-offset-5" >
			超越了<?php echo $over;?>位同事!
		</div>
		
	</div>
	<div class="row xjhy" >
		<div class="col-xs-7 col-xs-offset-5" >
			<?php $url=base_url("meet/rank");?>
			<span style="padding:7px;border:1px solid #dddddd;" onclick="window.location.href='<?php echo $url;?>'">查看全部会议评分及排名</span>
		</div>
	</div>
   <div class="row xjhy" >
		<div class="col-xs-3" >
			得分详情
		</div>
		<div class="col-xs-8" >
			得分详情<?php echo $list[0]['mscore'];?>分
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-4" >
			会议正点开始
		</div>
		<div class="col-xs-8" >
			<input placeholder="会议正点开始" value="<?php echo $minb;?>">
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-4" >
			会议正点结束
		</div>
		<div class="col-xs-8" >
			<input placeholder="会议正点结束" value="<?php echo $mine;?>">
		</div>
    </div>
	<div class="row xjhy">
		<div class="col-xs-5" >
			会议是否有缺席者
		</div>
		<div class="col-xs-7" >
			<input placeholder="缺席者" value="<?php echo $absentnum;?>">
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-5" >
			会议是否有迟到者
		</div>
		<div class="col-xs-7" >
			<input placeholder="迟到者" value="<?php echo $latenum;?>">
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-6" >
			会议纪要及出发时间
		</div>
		<div class="col-xs-6" >
			<input placeholder="会议纪要及出发时间" value="<?php echo $list[0]['mfiletime'];?>">
		</div>
    </div>
</div>
</body>
</html>