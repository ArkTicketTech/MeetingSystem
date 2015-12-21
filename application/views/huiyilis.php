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
        <nav class="top-nav" id="top-nav"><p><a id="admin">管理员</a><a id="backIndex" href="<?php echo base_url('admin/logout');?>">退出</a></p></nav>
    </div>
    <div class="nav" id="nav">
        <ul>
            <li><a href="<?php echo base_url('admin/user');?>">用户数据管理</a></li>
            <li style="background-color: #E5E5E5;color:#1F3563;"><a href="<?php echo base_url('admin/history');?>">会议历史资料管理</a></li>
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
                        <option value="0">会议标题</option>
                        <option value="1">决策事项</option>
                        <option value="2">会议时间</option>
                        <option value="3">发起人</option>
                    </select>
                    <input type="text" id="jiansuo" />
                    <input type="button" id="jiansuosub" value="检索" />
                </div>
            </header>
            <!-- 导出excel -->
            <table class="c-table" id="c-table" >
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
                        <td><?php echo "字段晚点加";?></td>
                        <td><?php echo $r['mplanbt'];?></td>
                        <td><?php echo $r['mconfirm'];?></td>
                        <td><?php echo $r['mfilename'];?></td>
                        <td class="download" url="<?php echo $r['mid'];?>" file="<?php echo $r['mfilename'];?>"><?php echo "下载";?></td>
                        <td><?php echo $r['uname'];?></td>
                        <td><?php echo "还没好";?></td>
                        <td><?php echo $r['mfilename'];?></td>
                        <td><?php echo $r['mscore'];?></td>
                    </tr>
                <?php 
                }?>
                </tbody>
            </table>
        </div>
        <!-- 导出excel -->
        <button onclick="toExcel('c-table','')">导出到excel</button>


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
<script src="http://libs.baidu.com/jquery/1.8.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    
    $('#jiansuosub').bind("click",function(){
        $type = $("#select-jiansuo").val();
        $search = $("#jiansuo").val();
        location.href = "<?php echo base_url('admin/history').'/'.$month;?>"+'/'+$search+'/'+$type;
    });
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
});
</script>
    <script type="text/javascript">  
    //添加了导出excel代码
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