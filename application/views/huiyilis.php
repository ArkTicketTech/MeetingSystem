<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会议历史管理</title>
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
            <li style="background-color: #E5E5E5;color:#1F3563;"><a href="<?php echo base_url('history');?>">会议历史资料管理</a></li>
            <li><a href="<?php echo base_url('admin/check');?>">会议审核管理</a></li>
            <li><a href="<?php echo base_url('admin/room');?>">会议室、项目及高管设置</a></li>
            <li><a href="<?php echo base_url('admin');?>">管理员设置</a></li>
        </ul>
    </div>
    <div class="mian-content">
        <div class="content">
            <header class="content-header">
                <div><label>月份:</label>
                    <select onchange="self.location.href=options[selectedIndex].value" >
                            <?php
                                for ($x=0; $x<=11; $x++){ 
                            ?>
                            <option style="width:10px" value="<?php echo base_url('admin/history/').'/'.($x+1);?>" <?php if($month == $x+1) echo 'selected' ;?> ><?php echo $x+1;?>月</option>
                            <?php
                                }
                            ?>
                    </select>
                </div>
                <div>
                    <select id="select-jiansuo">
                        <option>会议标题</option>
                        <option>决策事项</option>
                        <option>会议时间</option>
                        <option>发起人</option>
                    </select>
                    <input type="text" id="jiansuo" />
                    <input type="button" value="检索" />
                </div>
            </header>
            <table class="c-table"  >
                <tbody>
                <tr class="header">
                    <td>会议部门/项目部+会议标题</td>
                    <td>会议决策事项及建议决策方向</td>
                    <td>会议时间</td>
                    <td>是否为公司层会议</td>
                    <td>会议提纲及附件</td>
                    <td>会议二维码</td>
                    <td>发起人</td>
                    <td>参与者</td>
                    <td>会议纪要</td>
                    <td>会议评分</td>
                </tr>
                <?php foreach($list as $r){
                ?>
                    <tr class="content">
                        <td><?php echo $r['mname'];?></td>
                        <td><?php echo "direction";?></td>
                        <td><?php echo $r['mplanbt'];?></td>
                        <td><?php echo $r['mconfirm'];?></td>
                        <td><?php echo $r['mfilename'];?></td>
                        <td><?php echo "QRcode";?></td>
                        <td><?php echo $r['uname'];?></td>
                        <td><?php echo $r['uname'];?></td>
                        <td><?php echo $r['mfilename'];?></td>
                        <td><?php echo $r['mscore'];?></td>
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
</html>