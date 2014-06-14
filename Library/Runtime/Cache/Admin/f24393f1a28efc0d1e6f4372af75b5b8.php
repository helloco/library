<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>Unicorn Admin</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/uniform.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/select2.css" />		
		<link rel="stylesheet" href="__PUBLIC__/css/unicorn.main.css" />
		<link rel="stylesheet" href="__PUBLIC__/css/unicorn.grey.css" class="skin-color" />	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		
		
		<div id="header">
			<h1><a href="./dashboard.html">Unicorn Admin</a></h1>		
		</div>
		
		<div id="search">
			<input type="text" placeholder="Search here..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
		</div>
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> 欢迎您:<span class="text">  <?php echo ($_SESSION["userName"]); ?></span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Admin/Setting/alterAccountView');?>"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo U('Admin/Setting/logout');?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
            
		<div id="sidebar">
			<ul>
				<li><a href="<?php echo U('Admin/Admin/admin');?>"><i class="icon icon-th"></i> <span>图书信息</span></a></li>
				<li><a href="<?php echo U('Admin/Admin/addBookView');?>"><i class="icon icon-home"></i> <span>新增图书</span></a></li>
				<li><a href="<?php echo U('Admin/Admin/borrowStatusView');?>"><i class="icon icon-home"></i> <span>借阅历史</span></a></li>
				<li><a href="<?php echo U('Admin/Admin/qrcodeView');?>"><i class="icon icon-home"></i> <span>其它</span></a></li>
				<li class='active'><a href="<?php echo U('Admin/Setting/alterAccountView');?>"><i class="icon icon-home"></i> <span>设置</span></a></li>
				<li><a href="<?php echo U('Admin/Admin/tips');?>"><i class="icon-question-sign"></i> <span>不知道如何使用？</span></a></li>
			</ul>
		
		</div>
		
		<div id="style-switcher">
			<i class="icon-arrow-left icon-white"></i>
			<span>Style:</span>
			<a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
			<a href="#blue" style="background-color: #2D2F57;"></a>
			<a href="#red" style="background-color: #673232;"></a>
		</div>
		
		<div id="content">
			<div id="content-header">
				<h1>修改密码</h1>
				
			</div>
			<div id="breadcrumb">
				<a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#">修改密码</a>
			</div>
			<div class="container-fluid">
				
					<div class="row-fluid">
						<div class="span12">
							<div class="widget-box">
								<div class="widget-title">
									<span class="icon">
										<i class="icon-align-justify"></i>									
									</span>
									<h5 id='cf'>两次输入的密码请一致</h5>
								</div>
								<div class="widget-content nopadding">
									<form class="form-horizontal" method="post" action=<?php echo U('Admin/Setting/alterAccount');?> name="password_validate" id="password_validate" novalidate="novalidate" />
										<div class="control-group">
										<label class="control-label">Username</label>
										<div class="controls">
											<input type="text" id="form-field-2" name='username'>
										</div>
										</div>
										<div class="control-group">
											<label class="control-label">Password</label>
											<div class="controls">
												<input type="password" name="pwd" id="pwd" />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Confirm password</label>
											<div class="controls">
												<input type="password" name="pwd2" id="pwd2" />
											</div>
										</div>
										<div class="form-actions">
											<input type="submit" value="确认修改" class="btn btn-primary" />
										</div>
									</form>
								</div>
							</div>
						</div>			
					</div>
				</div>
				<div class="row-fluid">
					<div id="footer" class="span12">
						2014 &copy; Edian Studio.<a href="#">图书管理系统</a>
					</div>
				</div>
			</div>
		</div>
		
		
            
            <script src="__PUBLIC__/js/jquery.min.js"></script>
            <script src="__PUBLIC__/js/jquery.ui.custom.js"></script>
            <script src="__PUBLIC__/js/bootstrap.min.js"></script>
            <script src="__PUBLIC__/js/jquery.uniform.js"></script>
            <script src="__PUBLIC__/js/select2.min.js"></script>
            <script src="__PUBLIC__/js/jquery.validate.js"></script>
            <script src="__PUBLIC__/js/unicorn.js"></script>
            <script src="__PUBLIC__/js/unicorn.form_validation.js"></script>
            </body>
            <style type="text/css">

			#cf{
			color:red
			}
			</style>
</html>