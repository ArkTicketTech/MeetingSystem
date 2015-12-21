<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微信平台后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>">
    <script src="<?php echo base_url('js/dome.js');?>"></script>
</head>
<body>
<div class="mian">
    <div class="top">
        <p class="title">微信平台后台管理系统</p>
        <nav class="top-nav" id="top-nav"><p><a id="admin">管理员</a><a id="backIndex" href="<?php echo base_url('admin/logout');?>">退出</a></p></nav>
    </div>
    <div class="nav" id="nav">
        <ul>
            <li><a href="<?php echo base_url('admin/user');?>">用户数据管理</a></li>
            <li><a href="<?php echo base_url('admin/history');?>">会议历史资料管理</a></li>
            <li style="background-color: #E5E5E5;color:#1F3563;"><a href="<?php echo base_url('admin/check');?>">会议审核管理</a></li>
            <li><a href="<?php echo base_url('admin/room');?>">会议室、项目及高管设置</a></li>
            <li><a href="<?php echo base_url('admin');?>">管理员设置</a></li>
        </ul>
    </div>
    <div class="mian-content">
        <div class="content">
            <header class="content-header">

            </header>
            <table class="c-table"  >
                <tbody>
                <tr class="header">
                    <td>会议部门/<br>项目部+会议标题</td>
                    <td>会议决策事项及建议决策方向</td>
                    <td>会议时间</td>
                    <td>是否为公司层会议</td>
                    <td>发起人</td>
                    <td>参与者</td>
                    <td>申请时间</td>
                    <td>会议提纲及附件</td>
                    <td>操作</td>
                    <td>不通过理由</td>
                    <td>反馈确认</td>
                </tr>
                <?php foreach($list as $r){
                ?>
                    <tr class="content">
                        <td><?php echo $r['mname'];?></td>
                        <td><?php echo "字段晚点加";?></td>
                        <td><?php echo $r['mplanbt'];?></td>
                        <td><?php echo $r['mconfirm'];?></td>
                        <td><?php echo $r['uname'];?></td>
                        <td><?php echo "还没好";?></td>
                        <td><?php echo $r['mcreatet'];?></td>
                        <td><a class="download" url="<?php echo $r['mid'];?>" file="<?php echo $r['mfilename'];?>" onclick="download">下载</a></td>
                        <td><a class="pass">通过</a><a class="deny">不通过</a></td>
                        <td><input type="text" id="no-liyou"/></td>
                        <td><a class="confirm" mid="<?php echo $r['mid'];?>">确认</a><a class="discard">取消</a></td>
                    </tr>
                <?php 
                }?>
                </tbody>
            </table>
        </div>
        <div class="fenye">
            <span>当前第1页</span>
            <span>总共1页</span>
            <span><a>下一页</a></span>
               <span>
                   <select>
                       <option>2</option>
                       <option>3</option>
                   </select></span>
        </div>
    </div>
</div>
</body>
<style type="text/css">
.green{
    background-color: green;
}
</style>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.download').bind("click",function(){
        if($(this).attr("file")){  
            $temp = $(this).attr("file");
            $temp = $temp.split('.');
            location.href = "<?php echo base_url('uploads_meet').'/';?>"+$(this).attr("url")+"."+$temp[1];
        }
        else{
            alert("没有相关附件");
        }
    });
    $('.pass').bind("click",function(){
        if($(this).hasClass('green')){
        }
        else{
            $(this).addClass('green');
            $(this).parent().find('.deny').removeClass('green');
        }
    });
    $('.deny').bind("click",function(){
        if($(this).hasClass('green')){
        }
        else{
            $(this).addClass('green');
            $(this).parent().find('.pass').removeClass('green');
        }
    });
    $('.discard').bind("click",function(){
        $(this).parent().parent().find('.pass').removeClass('green');
        $(this).parent().parent().find('.deny').removeClass('green');
        $(this).parent().parent().find('input').val('');
    });
    $('.confirm').bind("click",function(){
        if($(this).parent().parent().find('.pass').hasClass('green')||$(this).parent().parent().find('.deny').hasClass('green')){
            if($(this).parent().parent().find('.pass').hasClass('green')){$pass = 1;}
            else{$pass=0;}
            $.post(
                "<?php echo base_url('admin/confirm').'/';?>"+$(this).attr("mid")+"/"+$pass,
                {'reason':$(this).parent().parent().find('input').val()},
                function(result){
                    alert("成功");
                }
            );
        }
        else{
            alert("请先选择是否通过！");
        }
    });
});
</script>
</html>