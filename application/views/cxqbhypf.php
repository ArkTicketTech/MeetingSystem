<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>查看全部会议评分</title>
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
			<span style="padding:12px;border:1px solid #dddddd;">查看全部会议评分</span>
		</div>
    </div>
	<div class="row xjhy" >
		<div class="col-xs-4 col-xs-offset-1" style="padding:0;    text-align: center;">
			<span style="padding:7px 1px;;border:1px solid #dddddd;">得分从高到低</span>
		</div>
		<div class="col-xs-4 col-xs-offset-2" style="padding:0;    text-align: center;">
			<span style="padding:7px 1px;;border:1px solid #dddddd;">得分从低到高</span>
		</div>
	</div>
	<div class="row xjhy" >
		<div class="col-xs-2" style="padding:0">
			<select style='width:100%;'>
				<option style="width:10px">月份</option>
			</select>
		</div>
		<div class="col-xs-1 check" >
			<input type="checkbox">
		</div>
		<div class="col-xs-4 checkTitle" >
			仅显示公司层会议
		</div>
		<div class="col-xs-1 check" >
			<input type="checkbox">
		</div>
		<div class="col-xs-4 checkTitle" style="width:38%;">
			仅显示非公司层会议
		</div>
    </div>
	
	<div class="row " >
		<table class="table table-bordered" style="background-color:#fff">
		  <thead>
			<tr>
			  <th>排名</th>
			  <th>会议名称</th>
			  <th>发起人</th>
			  <th>得分</th>
			</tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$count = 0;
		  		foreach ($list as $r) {
		  			$count++;
		  	?>
			<tr>
			  <th scope="row"><?php echo $count?></th>
			  <td><?php echo $r["mname"];?></td>
			  <td><?php echo $r["uname"];?></td>
			  <td><?php echo $r["mscore"];?></td>
			</tr>
			<?php
				}
			?>
		  </tbody>
		</table>
    </div>
	
</div>
</body>
</html>