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
			<a href="#" class="visible-phone"><i class="icon icon-th-list"></i> Validation</a>
			<ul>
				<li><a href="<?php echo U('Admin/Admin/admin');?>"><i class="icon icon-th"></i> <span>图书信息</span></a></li>
				<li class="active"><a href="<?php echo U('Admin/Admin/addBookView');?>"><i class="icon icon-home"></i> <span>新增图书</span></a></li>
				<li><a href="<?php echo U('Admin/Admin/borrowStatusView');?>"><i class="icon icon-home"></i> <span>借阅历史</span></a></li>
				<li><a href="<?php echo U('Admin/Admin/qrcodeView');?>"><i class="icon icon-home"></i> <span>其它</span></a></li>
				<li><a href="<?php echo U('Admin/Setting/alterAccountView');?>"><i class="icon icon-home"></i> <span>设置</span></a></li>
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
				<h1>新增图书</h1>
				
			</div>
			<div id="breadcrumb">
				<a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				
				<a href="#" class="current">新增一本图书信息</a>
				
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>									
								</span>
								<h5>此处添加的书会增加到书本数据库</h5>
								<span class="label label-important">提交后如有填写错误，请前往左侧菜单栏“图书信息”中修改</span>
							</div>
							<div class="widget-content nopadding">
								<form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate" />
                                    <div class="control-group">
                                        <label class="control-label">ISBN</label>
                                        <div class="controls">
                                            <input type="text" name="required" id="form-field-0" onkeyup="f1();"/>
                                            <div for="" generated="true" class="help-inline" id="r1"></div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">索书号</label>
                                        <div class="controls">
                                            <input type="text" name="required" id="form-field-1" onkeyup="f1();"/>
                                            <div for="" generated="true" class="help-inline" id="r1"></div>
                                        </div>
                                    </div>
                                     <div class="control-group">
                                        <label class="control-label">书名</label>
                                        <div class="controls">
                                            <input type="text" name="required" id="form-field-6" onkeyup="f1();"/>
                                            <div for="" generated="true" class="help-inline" id="r2"></div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">作者</label>
                                        <div class="controls">
                                            <input type="text" name="required" id="form-field-2" onkeyup="f1();"/>
                                            <div for="" generated="true" class="help-inline" id="r2"></div>
                                        </div>
                                    </div>
									<div class="control-group">
                                        <label class="control-label">出版社</label>
                                        <div class="controls">
                                            <input type="text" name="required" id="form-field-3" onkeyup="f1();"/>
                                            <div for="" generated="true" class="help-inline" id="r3"></div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Image</label>
                                        <div class="controls">
                                            <input type="text" name="required" id="form-field-5" onkeyup="f1();"/>
                                            <div for="" generated="true" class="help-inline" id="r3"></div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">捐献者</label>
                                        <div class="controls">
                                            <input type="text" name="required" id="form-field-4" onkeyup="f1();"/>
                                            <div for="" generated="true" class="help-inline" id="r4"></div>
                                        <div id='result'></div>
                                        </div>
                                    </div>                                    
                                    <div class="form-actions">
                                        <input type="button" value="添 加" class="btn btn-primary" onclick="addBook();"/>
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
		<script type="text/javascript">
		function f1(){
			var a= document.getElementById('form-field-1').value;
			if(a.length < 3){
				document.getElementById('r1').innerHTML = "please input right value";
			}else {
				document.getElementById('r1').innerHTML = "right";
			}
		}
		</script>
		<script type="text/javascript">
		function addBook(){
			ThinkAjax.send('<?php echo U("Admin/Admin/addBook");?>','bookID='+$('form-field-1').value+'&author='+$('form-field-2').value+'&publishHouse='+$('form-field-3').value+'&from='+$('form-field-4').value+'&isbn='+$('form-field-0').value+'&images='+$('form-field-5').value+'&name='+$('form-field-6').value,complete,'result');
		}
		
		function complete(data,status){
			if (status==1){
			//var data = eval("("+data+")");
			//alert('修改成功！');
			}else{
			//alert('您没有选择要修改的选项！');
			}
		}
		</script>
		
            
            <script src="__PUBLIC__/js/jquery.min.js"></script>
            <script src="__PUBLIC__/js/jquery.ui.custom.js"></script>
            <script src="__PUBLIC__/js/bootstrap.min.js"></script>
            <script src="__PUBLIC__/js/jquery.uniform.js"></script>
            <script src="__PUBLIC__/js/select2.min.js"></script>
            <script src="__PUBLIC__/js/jquery.validate.js"></script>
            <script src="__PUBLIC__/js/unicorn.js"></script>
            <script src="__PUBLIC__/js/unicorn.form_validation.js"></script>
            <!-- ajax js -->
            <script type="text/javascript" src="__PUBLIC__/tp_Ajax/Base.js"></script>
			<script type="text/javascript" src="__PUBLIC__/tp_Ajax/prototype.js"></script>
			<script type="text/javascript" src="__PUBLIC__/tp_Ajax/mootools.js"></script>
			<script type="text/javascript" src="__PUBLIC__/tp_Ajax/Ajax/ThinkAjax.js"></script>
	</body>
</html>