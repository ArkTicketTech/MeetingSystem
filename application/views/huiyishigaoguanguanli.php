<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微信平台后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>">
    <script src="<?php echo base_url('js/dome.js');?>"></script>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url('js/leanModal.js');?>"></script>
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
            <li style="background-color: #E5E5E5;color:#1F3563;"><a href="<?php echo base_url('admin/room');?>">会议室、项目及高管设置</a></li>
            <li><a href="<?php echo base_url('admin');?>">管理员设置</a></li>
        </ul>
    </div>
    <div class="mian-content">
        <div class="content">
            <header class="content-header">
                <h1>会议室管理</h1>
            </header>
            <table class="c-table"  >
                <tbody>
                <tr class="header">
                    <td>会议室名称</td>
                    <td>可容纳人数</td>
                    <td>是否有多媒体</td>
                    <td>是否有投影仪</td>
                    <td>会议室地址</td>
                    <td>确认新增</td>
                </tr>
                <?php foreach($list as $r){
                ?>
                    <tr class="content">
                        <td><?php echo $r['rname'];?></td>
                        <td><?php echo $r['rpeople'];?></td>
                        <td><?php echo $r['rmedia'];?></td>
                        <td><?php echo $r['rprojection'];?></td>
                        <td><?php echo $r['raddr'];?></td>
                        <td><a href="#loginmodal" class="modaltrigger">新增</a><a class="remove" remove='<?php echo $r['rid'];?>'>清空</a></td>
                    </tr>
                <?php 
                }?>
                </tbody>
            </table>
        </div>


        <div id="loginmodal" style="display:none;">
        <h1>User Login</h1>
            <form id="loginform" name="loginform" method="post" action="<?php echo base_url('admin/createroom')?>">
                <label for="rname">会议室名称:</label>
                <input type="text" name="rname"  class="txtfield" tabindex="1">
                <label for="rpeople">可容纳人数:</label>
                <input type="text" name="rpeople"  class="txtfield" tabindex="2">
                <label for="rmedia">是否有多媒体:</label>
                <input type="text" name="rmedia"  class="txtfield" tabindex="3">
                <label for="rprojection">是否有投影仪:</label>
                <input type="text" name="rprojection"  class="txtfield" tabindex="4">
                <label for="raddr">会议室地址:</label>
                <input type="text" name="raddr"  class="txtfield" tabindex="5">

                <div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="新建" tabindex="6"></div>
                <div class="center"><input type="button"  class="flatbtn-blu hidemodal" value="取消" tabindex="7"></div>
            </form>
        </div>


        <div style="height:110px;"><div id="admin-style" class="admin-style">高管名单设置（输入关注者的微信昵称，逗号隔开）</div>
            <input type="text" class="admin-style" style="width:50%;margin-top:5px;height:50px;">
        </div>
        <div style="height:110px;"><div id="huiyixiangmu" class="admin-style">会议项目及部门输入名称，逗号隔开</div>
            <input type="text" class="admin-style" style="width:50%;margin-top:5px;height:50px;">
        </div>
        <div class="fenye" id="fenyeDiv">
            <span>当前第{{index}}页</span>
            <span>总共{{count}}页</span>
            <span><a id="xiayiye">下一页</a></span>
               <span>
                   <select id="fenye">
                       <option>2</option>
                       <option>3</option>
                   </select></span>
        </div>
    </div>
</div>
</body>
<script>
$(document).ready(function(){
    $('.remove').bind("click",function(){
        location.href = "<?php echo base_url('admin/removeroom').'/';?>"+$(this).attr("remove");
    });
  $('.modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
});



 
</script>
</html>