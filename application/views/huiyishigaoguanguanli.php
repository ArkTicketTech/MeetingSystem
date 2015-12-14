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
        <nav class="top-nav" id="top-nav"><p><a id="admin">管理员</a><a id="backIndex">退出</a></p></nav>
    </div>
    <div class="nav" id="nav">
        <ul>
            <li><a href="<?php echo base_url('admin/user');?>">用户数据管理</a></li>
            <li><a href="<?php echo base_url('admin/history');?>">会议历史资料管理</a></li>
            <li><a href="<?php echo base_url('admin/check');?>">会议审核管理</a></li>
            <li style="background-color: #E5E5E5;color:#1F3563;"><a href="<?php echo base_url('room');?>">会议室、项目及高管设置</a></li>
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
                <tr class="content">
                    <td>Albert</td>
                    <td>50人</td>
                    <td>是</td>
                    <td>无</td>
                    <td>广东省****</td>
                    <td><a href="#">新增</a><a href="#">清空</a></td>
                </tr>
                <tr class="content">
                    <td>Albert</td>
                    <td>50人</td>
                    <td>是</td>
                    <td>无</td>
                    <td>广东省****</td>
                    <td><a href="#">新增</a><a href="#">清空</a></td>
                </tr>
                <tr class="content">
                    <td>Albert</td>
                    <td>50人</td>
                    <td>是</td>
                    <td>无</td>
                    <td>广东省****</td>
                    <td><a href="#">新增</a><a href="#">清空</a></td>
                </tr>
                <tr class="content">
                    <td>Albert</td>
                    <td>50人</td>
                    <td>是</td>
                    <td>无</td>
                    <td>广东省****</td>
                    <td><a href="#">新增</a><a href="#">清空</a></td>
                </tr>
                <tr class="content">
                    <td>Albert</td>
                    <td>50人</td>
                    <td>是</td>
                    <td>无</td>
                    <td>广东省****</td>
                    <td><a href="#">新增</a><a href="#">清空</a></td>
                </tr>
                <tr class="content">
                    <td>Albert</td>
                    <td>50人</td>
                    <td>是</td>
                    <td>无</td>
                    <td>广东省****</td>
                    <td><a href="#">新增</a><a href="#">清空</a></td>
                </tr>
                <tr class="content">
                    <td>Albert</td>
                    <td>50人</td>
                    <td>是</td>
                    <td>无</td>
                    <td>广东省****</td>
                    <td><a href="#">新增</a><a href="#">清空</a></td>
                </tr>
                <tr class="content">
                    <td>Albert</td>
                    <td>50人</td>
                    <td>是</td>
                    <td>无</td>
                    <td>广东省****</td>
                    <td><a href="#">新增</a><a href="#">清空</a></td>
                </tr>
                </tbody>
            </table>
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
</html>