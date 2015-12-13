<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>新建日程</title>
    <!-- 包含头部信息用于适应不同设备 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <!-- 包含 bootstrap 样式表 -->
    <link href="<?php echo base_url('css/common.css');?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/index.css');?>">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('js/date.js');?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('js/iscroll.js');?>" ></script>
</script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/datetime/DateTimePicker.css')?>" />
</head>
<body >
<div class="container-fluid "  style="margin-bottom:100px">
    <form method="post" class="form" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url('event/add_post');?>"> 
    <div class="row xjhy" >
        <div class="col-xs-3" >
            日程内容
        </div>
        <div class="col-xs-8" >
            <input name="econtent" placeholder="请输入日程内容" value="">
        </div>
    </div>  
    <div class="row xjhy" >
        <div class="col-xs-3" >
            日程类型
        </div>
        <div class="col-xs-8" >
            <select name="etype">
                <option value="0">会议</option>
                <option value="1">其他</option>
                <option value="2">外出</option>
            </select>
        </div>
    </div>
    <div style="height:10px;"></div>
<!--     <div class="row xjhy" >
        <div class="col-xs-6" >
            是否创建全天日程
        </div>
        <div class="col-xs-6 checkBtn" >
            <span class="left" ></span>
            <input style="display:none;" name="mchecktype" value="0"></input>
        </div>
    </div> -->
    <div>
        <div class="row xjhy" >
            <div class="col-xs-3" >
                开始时间
            </div>
            <div class="col-xs-8" >
                <input name="ebt" id="dpstart" data-field="datetime" placeholder="请选择时间" value="">
            </div>
        </div>
       <div class="row xjhy" >
            <div class="col-xs-3" >
                结束时间
            </div>
            <div class="col-xs-8" >
                <input name="eet" id="dpend" data-field="datetime" placeholder="请选择时间" value="">
            </div>
        </div>
        <div class="row xjhy" >
            <div class="col-xs-8" >
                日程提前提醒时间（分钟）
            </div>
            <div class="col-xs-4" >
                <input class="form_remind" name="eremind" placeholder="30" value="">
            </div>
        </div>
    </div>
    </form>
</div>
<div id="datePlugin"></div>
<div class="newS" >
    <div class="bottomSpan" >
        <span style="width:96%;height:40px;background-color:#30cd2f;">确认提交</span>
    </div>
</div>
</body>
<script>

$(document).ready(function(){

    $(".bottomSpan").children().eq(0).click(function(){
        if($(".form_remind").val()=="") $(".form_remind").val(30);
        $('form').submit();
        //window.document.location="<?php echo base_url('meet/stay');?>";

    });
    $(".checkBtn").bind("click",function(){
        if($(this).children().eq(0).hasClass('left')){
            $(this).children().eq(0).removeClass('left').addClass('right');
            $(this).children().eq(1).val(1);
        }
        else{
            $(this).children().eq(0).removeClass('right').addClass('left'); 
            $(this).children().eq(1).val(0);
        }
    });
    $('#dpstart').date({theme:"datetime"});
    $('#dpend').date({theme:"datetime"});
});

</script>

</html>