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
    </div>

    <div class="mian-content">
        <div class="content">
            <header class="content-header">
                <h1>登陆</h1>
            </header>
            <?php echo form_open('admin/login'); ?>  
            <fieldset>
                <p><label>密码:</label><input type="text" id="xpsd" name="pwd" class="psd" /></p>
                <p><input style="margin-left: 200px;" type="submit" id="xiugai" name="xiugai" value="确认" /></p>
            </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>