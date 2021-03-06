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
		 <style type="text/css">
			#result3,#result,#result2{
				color:red
	        }
		</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		
		
		<div id="header">
			<h1><a href="./dashboard.html"> <?php echo ($_SESSION["userName"]); ?> </a></h1>		
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
				<li class="active"><a href="<?php echo U('Admin/Admin/admin');?>"><i class="icon icon-th"></i> <span>图书信息</span></a></li>
				<li><a href="<?php echo U('Admin/Admin/addBookView');?>"><i class="icon icon-home"></i> <span>新增图书</span></a></li>
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
				<h1>图书信息</h1>
				
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">图书信息</a>
				<a href="#" class="current"><div id="result3" >&nbsp;</div></a>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
								<h5>此表显示的是馆藏所有书本信息（状态  ‘1’ 代表可借，‘0’ 代表借出）</h5>
							</div>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>ISBN</th>
											<th>索书号</th>
											<th>书名</th>
											<th>作者</th>
											<th>出版社</th>
											<th>Image</th>
											<th>捐献者</th>
											<th>上架时间</th>
											<th>状态</th>
											<th>修改</th>
											<th>删除</th>
										</tr>
									</thead>
									<tbody>
										<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($vo["isbn"]); ?></td>
										<td><?php echo ($vo["bookID"]); ?></td>
										<td><?php echo ($vo["name"]); ?></td>
										<td><?php echo ($vo["author"]); ?></td>
										<td><?php echo ($vo["publishHouse"]); ?></td>
										<td><a href='<?php echo ($vo["images"]); ?>' target=_blank><?php echo ($vo["images"]); ?></a></td>
										<td><?php echo ($vo["from"]); ?></td>
										<td><?php echo ($vo["birthday"]); ?></td>
										<td><?php echo ($vo["status"]); ?></td>
										<td>
										<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																<button class="btn btn-xs btn-info" onclick='transform("<?php echo ($vo["id"]); ?>")' >
																	<i class="icon-edit bigger-120"></i>
																</button>
															</div>
										</td>
										
										<td>
										<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																<button class="btn btn-xs btn-danger" onclick='deleteBook("<?php echo ($vo["id"]); ?>")'>
																	<i class="icon-trash bigger-120"></i>
																</button>
															</div>
										</td>
										</tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
									</tbody>
								</table>							
							</div>
						</div>
						<div class="pagination">
									<ul>
										<li><a href="#">Prev</a></li>
										
										<?php $__FOR_START_6706__=1;$__FOR_END_6706__=$pageCount+1;for($i=$__FOR_START_6706__;$i < $__FOR_END_6706__;$i+=1){ ?><li><a href="<?php echo U('Admin/Admin/admin',array('p' => $i));?>"><?php echo ($i); ?></a></li><?php } ?>
										
									  	<li><a href="#">Next</a></li>
									</ul>
								</div>
					</div>
				</div>
				<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>									
								</span>
								<h5><div>修改书本信息</div></h5>
								<div id='result'></div>
							</div>
							<div class="widget-content nopadding">
								<form action="#" method="get" class="form-horizontal">
									<div class="control-group">
										<label class="control-label">ISBN</label>
										<div class="controls">
											<input type="text" id="form-field-0">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">索书号</label>
										<div class="controls">
										
										<input  type="hidden" id="updateId" />
											<input type="text" id="form-field-1">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">书名</label>
										<div class="controls">
											<input type="text" id="form-field-8">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">作者</label>
										<div class="controls">
											<input type="text" id="form-field-2">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">出版社</label>
										<div class="controls">
											<input type="text" id="form-field-3">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Images</label>
										<div class="controls">
											<input type="text" id="form-field-7">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">捐献者</label>
										<div class="controls">
											<input type="text" id="form-field-4">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">上架时间</label>
										<div class="controls">
											<input type="text" id="form-field-5" disabled="disabled">
											<span class="help-block">上架时间不可更改！</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">借阅状态</label>
										<div class="controls">
											<input type="text" id="form-field-6" >
											<span class="help-block" id="warning1">借阅状态请慎重更改！建议不要更改！(0代表已被借出，1代表可借)</span>
											<div id='result2'></div>
										</div>
									</div>
									
									
									<div class="form-actions">
										<button type="button" class="btn btn-primary" onclick="updateBook();">
										更新
										</button>
										
									</div>
									
								</form>
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
		jQuery('.icon-trash').click(function(){
		    var _this = jQuery(this);
		    var _tr = _this.closest('tr');
		    _tr.hide();
		});
		</script>
		<script language="JavaScript">
		<!--
		
		function transform(a){
			ThinkAjax.send('<?php echo U("Admin/Admin/alterBookView");?>','id='+a,complete,'result');
		}
		
		function complete(data,status){
			if (status==1)
			{
			
			var data = eval("("+data+")");
			/*得到回调数据，开始赋值*/
			$('updateId').value = data[0].id;
			$('form-field-1').value = data[0].bookID;
			$('form-field-2').value = data[0].author;
			$('form-field-3').value = data[0].publishHouse;
			$('form-field-4').value = data[0].from;
			$('form-field-5').value = data[0].birthday;
			$('form-field-6').value = data[0].status;
			$('form-field-7').value = data[0].images;
			$('form-field-8').value = data[0].name;
			$('form-field-0').value = data[0].isbn;
			
			$('list').innerHTML = '<span>修改id='+data[0].id+'的作品信息</span>';
			}
		}
		
		/* 第二个ajax，提交修改信息 */

		function updateBook(){
			ThinkAjax.send('<?php echo U("Admin/Admin/update");?>','id='+$('updateId').value+'&bookID='+$('form-field-1').value+'&author='+$('form-field-2').value+'&publishHouse='+$('form-field-3').value+'&from='+$('form-field-4').value+'&isbn='+$('form-field-0').value+'&images='+$('form-field-7').value+'&name='+$('form-field-8').value+'&status='+$('form-field-6').value,complete2,'result2');
		}
		
		function complete2(data,status){
			if (status==1){
			//var data = eval("("+data+")");
			//alert('修改成功！');
			//$('result2').innerHTML = "修改成功";
				//jQuery('.help-block').html = '修改成功';
			}else{
			//alert('您没有选择要修改的选项！');
			}
		}
		
		function deleteBook(a){
			ThinkAjax.send('<?php echo U("Admin/Admin/deleteBook");?>','id='+a,complete3,'result3');
		}
		
		function complete3(data,status){
			if (status==1){
				alert("删除成功！");
				
			}else{
				alert("操作失败");
			}
		}
//-->

</script>
<script type="text/javascript">
document.getElementById('warning1').style.color="red"
</script>
           
            <script src="__PUBLIC__/js/jquery.min.js"></script>
            <script src="__PUBLIC__/js/jquery.ui.custom.js"></script>
            <script src="__PUBLIC__/js/bootstrap.min.js"></script>
            <script src="__PUBLIC__/js/jquery.uniform.js"></script>
            <script src="__PUBLIC__/js/select2.min.js"></script>
            <script src="__PUBLIC__/js/jquery.dataTables.min.js"></script>
            <script src="__PUBLIC__/js/unicorn.js"></script>
            <script src="__PUBLIC__/js/unicorn.tables.js"></script>
            <!-- ajax js -->
            <script type="text/javascript" src="__PUBLIC__/tp_Ajax/Base.js"></script>
			<script type="text/javascript" src="__PUBLIC__/tp_Ajax/prototype.js"></script>
			<script type="text/javascript" src="__PUBLIC__/tp_Ajax/mootools.js"></script>
			<script type="text/javascript" src="__PUBLIC__/tp_Ajax/Ajax/ThinkAjax.js"></script>
	</body>
</html>