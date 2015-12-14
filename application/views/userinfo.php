<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <meta charset="UTF-8">
    <title>微信平台后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('date/skin/WdatePicker.css');?>">
    <script src="<?php echo base_url('js/angular-1.0.1.min.js');?>"></script>
    <script src="<?php echo base_url('js/dome.js');?>"></script>
    <script src="<?php echo base_url('date/WdatePicker.js');?>"></script>
    <script>
        function FenYe($scope) {
            $scope.ye = {
                index:1,
                count:3
            }
        }
    </script>
</head>
<body>
    <div class="mian">
       <div class="top">
           <p class="title">微信平台后台管理系统</p>
           <nav class="top-nav" id="top-nav"><p><a id="admin">管理员</a><a id="backIndex">退出</a></p></nav>
       </div>
       <div class="nav" id="nav">
           <ul>
               <li style="background-color: #E5E5E5;color:#1F3563;"><a href="<?php echo base_url('admin/user');?>">用户数据管理</a></li>
               <li><a href="<?php echo base_url('admin/history');?>">会议历史资料管理</a></li>
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
                            <option style="width:10px" value="<?php echo base_url('admin/user/').'/'.($x+1);?>" <?php if($month == $x+1) echo 'selected' ;?> ><?php echo $x+1;?>月</option>
                            <?php
                                }
                            ?>
                        </select>

                    </div>
                    <div>
                        <input class="orderby" id="orderby" name="orderby" type="button" value="升序排列">
                    </div>
                </header>
                <table class="c-table"  >
                    <tbody>
                        <tr class="header">
                            <td>微信昵称</td>
                            <td>身份</td>
                            <td>参会次数</td>
                            <td>迟到次数</td>
                            <td>缺席次数</td>
                            <td>请假次数</td>
                        </tr>
                        <?php foreach ($list as $r) {
                            
                        ?>
                            <tr class="content">
                                <td><?php echo $r['uname'];?></td>
                                <td><?php echo ($r['type'])?"高管":"普通员工";?></td>
                                <td><?php echo $r['abatnum'];?></td>
                                <td><?php echo $r['abltnum'];?></td>
                                <td><?php echo $r['ababnum'];?></td>
                                <td><?php echo $r['ablvnum'];?></td>
                            </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
           <div class="fenye" id="fenyeDiv" ng-controller="FenYe">
               <span>当前第{{ye.index}}页</span>
               <span>总共{{ye.count}}页</span>
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