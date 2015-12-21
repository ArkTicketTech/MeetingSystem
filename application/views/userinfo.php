<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <meta charset="UTF-8">
    <title>微信平台后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('date/skin/WdatePicker.css');?>">
    <script src="http://libs.baidu.com/jquery/1.8.0/jquery.min.js"></script>
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
           <nav class="top-nav" id="top-nav"><p><a id="admin">管理员</a><a id="backIndex" href="<?php echo base_url('admin/logout');?>">退出</a></p></nav>
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
                <!-- 导出excel -->
                <table class="c-table" id="c-table" >
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
            <!-- 导出excel -->
            <button onclick="toExcel('c-table','')">导出到excel</button>
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
    <script type="text/javascript">  
        function toExcel(inTblId, inWindow) {  
            if ($.browser.msie) { //如果是IE浏览器  
                try {  
                    var allStr = ""; var curStr = "";  
                    if (inTblId != null && inTblId != "" && inTblId != "null") {  
                        curStr = getTblData(inTblId, inWindow);  
                    }  
                    if (curStr != null) {  
                        allStr += curStr;  
                    }  
                    else {  
                        alert("你要导出的表不存在！");  
                        return;  
                    }  
                    var fileName = getExcelFileName();  
                    doFileExport(fileName, allStr);  
                }  
                catch (e) {  
                    alert("导出发生异常:" + e.name + "->" + e.description + "!");  
                }  
            } else {
                var uri = 'data:application/vnd.ms-excel;base64,';
                var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head></head><body><table>{table}</table></body></html>';
                var base64 = function(s) {return window.btoa(unescape(encodeURIComponent(s))) };
                var format = function(s, c) {return s.replace(/{(\w+)}/g,function(m, p) {return c[p]; }) };  
                table= document.getElementById("c-table")
                var ctx = {worksheet: name|| 'Worksheet', table: table.innerHTML}
                window.location.href = uri+ base64(format(template, ctx));
            }  
        } function getTblData(inTbl, inWindow) {  
            var rows = 0; var tblDocument = document;  
            if (!!inWindow && inWindow != "") {  
                if (!document.all(inWindow)) {  
                    return null;  
                } else {  
                    tblDocument = eval(inWindow).document;  
                }  
            }  
            var curTbl = tblDocument.getElementById(inTbl);  
            if (curTbl.rows.length > 65000) {  
                alert('源行数不能大于65000行');  
                return false;  
            }  
            if (curTbl.rows.length <= 1) {  
                alert('数据源没有数据');  
                return false;  
            }  
            var outStr = "";  
            if (curTbl != null) {  
                for (var j = 0; j < curTbl.rows.length; j++) {  
                    for (var i = 0; i < curTbl.rows[j].cells.length; i++) {  
                        if (i == 0 && rows > 0) {  
                            outStr += " \t"; rows -= 1;  
                        }  
                        var tc = curTbl.rows[j].cells[i];  
                        if (j > 0 && tc.hasChildNodes() && tc.firstChild.nodeName.toLowerCase() == "input") {  
                            if (tc.firstChild.type.toLowerCase() == "checkbox") {  
                                if (tc.firstChild.checked == true) {  
                                    outStr += "是" + "\t";  
                                } else {  
                                    outStr += "否" + "\t";  
                                }  
                            }  
                        } else {  
                            outStr += " " + curTbl.rows[j].cells[i].innerText + "\t";  
                        }  
                        if (curTbl.rows[j].cells[i].colSpan > 1) {  
                            for (var k = 0; k < curTbl.rows[j].cells[i].colSpan - 1; k++) {  
                                outStr += " \t";  
                            }  
                        }  
                        if (i == 0) {  
                            if (rows == 0 && curTbl.rows[j].cells[i].rowSpan > 1) {  
                                rows = curTbl.rows[j].cells[i].rowSpan - 1;  
                            }  
                        }  
                    }  
                    outStr += "\r\n";  
                }  
            } else {  
                outStr = null; alert(inTbl + "不存在!");  
            }  
            return outStr;  
        }  
        function getExcelFileName() {  
            var d = new Date(); var curYear = d.getYear(); var curMonth = "" + (d.getMonth() + 1);  
            var curDate = "" + d.getDate(); var curHour = "" + d.getHours(); var curMinute = "" +  
             d.getMinutes(); var curSecond = "" + d.getSeconds();  
            if (curMonth.length == 1) {  
                curMonth = "0" + curMonth;  
            }  
            if (curDate.length == 1) {  
                curDate = "0" + curDate;  
            }  
            if (curHour.length == 1) {  
                curHour = "0" + curHour;  
            }  
            if (curMinute.length == 1) {  
                curMinute = "0" + curMinute;  
            }  
            if (curSecond.length == 1) {  
                curSecond = "0" + curSecond;  
            }  
            var fileName = "用户信息" + curYear + curMonth + curDate + curHour + curMinute + curSecond + ".xls";  
            return fileName;  
        }  
        function doFileExport(inName, inStr) {  
            var xlsWin = null;  
            if (!!document.all("glbHideFrm")) {  
                xlsWin = glbHideFrm;  
            } else {  
                var width = 1; var height = 1;  
                var openPara = "left=" + (window.screen.width / 2 + width / 2) + ",top=" + (window.screen.height + height / 2) +  
                 ",scrollbars=no,width=" + width + ",height=" + height;  
                xlsWin = window.open("", "_blank", openPara);  
            }  
            xlsWin.document.write(inStr);  
            xlsWin.document.close();  
            xlsWin.document.execCommand('Saveas', true, inName);  
            xlsWin.close();  
        }  
    </script> 
</html>