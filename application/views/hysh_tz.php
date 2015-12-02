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
	<div class="row meetSh" >
		<div class="col-xs-9" >
			<div class="row meetTime"  >
				会议标题
				<span>XXXXXXXXXXX</span>
			</div>
			<div class="row meetTime"  >
				开会时间
				<span>2015-06-04</span>
				<span>18:00-18:45</span>
			</div>
			<div class="row meetTime"  >
				提交时间
				<span>2015-06-04</span>
				<span>18:00</span>
			</div>
            <div class="row">
                <div class="col-xs-9" >
                    <div class="row meetTime"  >
                        审核结果
                        <span>不通过</span>
                        
                    </div>
                    <div class="row meetTime"  >
                        原因
                        <span>有重要事情先讨论</span>
                        
                    </div>
                 </div>
                <div class="col-xs-3">
                    <div>
					    <button class="btn btn-default" type="submit">修改后从新提交</button>
                    </div>
                </div >
            </div>
		</div>
		<div class="col-xs-1" >
			>
		</div>
    </div>
    <div class="row meetSh" >
		<div class="col-xs-9" >
			<div class="row meetTime"  >
				会议标题
				<span>XXXXXXXXXXX</span>
			</div>
			<div class="row meetTime"  >
				开会时间
				<span>2015-06-04</span>
				<span>18:00-18:45</span>
			</div>
			<div class="row meetTime"  >
				提交时间
				<span>2015-06-04</span>
				<span>18:00</span>
			</div>
			<div class="row meetTime"  >
				审核结果
				<span>通过</span>
				
			</div>
		</div>
		<div class="col-xs-1" >
			>
		</div>
    </div>
    
	

   
</div>
<div class="newS" style="height:60px">
 <div class="bottom" >
			重要通知
	</div>
</div>
</body>
</html>