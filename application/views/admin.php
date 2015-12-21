<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微信平台后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>">
    <script src="<?php echo base_url('js/dome.js');?>"></script>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
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
            <li><a href="<?php echo base_url('admin/check');?>">会议审核管理</a></li>
            <li><a href="<?php echo base_url('admin/room');?>">会议室、项目及高管设置</a></li>
            <li style="background-color: #E5E5E5;color:#1F3563;"><a href="<?php echo base_url('admin');?>">管理员设置</a></li>
        </ul>
    </div>
    <div class="mian-content">
        <div class="content">
            <header class="content-header">
                <h1>管理员密码设置</h1>
            </header>
            <?php echo form_open('admin/changepass'); ?>  
                <fieldset>
                    <legend>管理员密码设置</legend>
                    <p><label>旧密码:</label><input type="text" id="jiupsd" name="porigin" class="psd" /></p>
                    <p><label>新密码:</label><input type="text" id="xpsd" name="pnew" class="psd" /></p>
                    <p><label>确认密码:</label><input type="text" id="qpsd" name="pnew2" class="psd" /></p>
                    <p><input style="margin-left: 200px;" id="xiugai" name="xiugai" value="确认修改" /></p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
<script>
$(document).ready(function(){
    $("#xiugai").bind("click",function(){
        if($("#xpsd").val() != $("#qpsd").val()){
            alert("两次密码不一致");
        }
        else{
            $("form").submit();
        }
    });
}); 
</script>
</html>