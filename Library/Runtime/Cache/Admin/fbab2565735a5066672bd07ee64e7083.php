<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unicorn Admin</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="__PUBLIC__/css/unicorn.login.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="logo">
            <img src="__PUBLIC__/img/logo.png" alt="" />
        </div>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="<?php echo U('checkLogin');?>" method="post"/>
				<p>Enter username and password to continue.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="Username" name="adminName"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="adminPwd"/>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-actions">
                    <span class="pull-left-1"><span class="pull-left"><label class="inline">
	<span class="lbl"><input type="text" class="input-small" name="verify" placeholder="验证码"></span><img src="/zendStudio/Library/index.php/Admin/Index/verify.html"></label></span></span>
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
                </div>
            </form>
            
        </div>
        
        <script src="__PUBLIC__/js/jquery.min.js"></script>  
        <script src="__PUBLIC__/js/unicorn.login.js"></script> 
        <style>
        .pull-left-1{
        	float: left;
       		margin-left: 58px;
        }
        </style>
    </body>
</html>