<?php
class AdminAction extends InitAction{
	public function pageBase($model,$display,$orderBy,$where){
		$Data = M($model);
		import('ORG.Util.Page');
		$count = $Data->where($where)->count();
		$pageSize  = 8;
		$pageCount = ceil($count/$pageSize);
		$Page  = new Page($count,$pageSize);
		$nowPage = isset($_GET['p'])?$_GET['p']:1;
		if ($nowPage < 1) {
			$nowPage  = 1;
		}
			
		$nowPage = ($nowPage > $pageCount)?$pageCount:$nowPage;
		$list = $Data->where($where)->order($orderBy)->page($nowPage.','.$Page->listRows)->select();
		$show       = $Page->show();// 分页显示输出

		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('count',$count);
		$this->assign('pageCount',$pageCount);
		$this->assign('pageNow',$nowPage);
		
		$this->display($display);
	}
	public function admin(){
		$this->pageBase("Book", "admin","bookID");
	}
	
	public function alterBookView(){
		if (!empty($_POST['id'])) {
			$Model = M('Book');
				
			//$data = $Model->where("id='%d'",$_POST['id'])->select();
			$data = json_encode($Model->where("id='%d'",$_POST['id'])->select());
			$this->ajaxReturn($data,'请在下面的表单中修改书本信息',1);
		}else{
			$this->ajaxReturn(0,'操作错误',0);
		}
	}
	
	public function update(){
		if (!empty($_POST['id'])) {
			$id              = $_POST['id'];
			$data['isbn'] = $_POST['isbn'];
			$data['bookID']  = $_POST['bookID'];
			$data['author']  = $_POST['author'];
			$data['publishHouse'] = $_POST['publishHouse'];
			$data['images'] = $_POST['images'];
			$data['name'] = $_POST['name'];
			$data['from'] = $_POST['from'];
			$data['status'] = $_POST['status'];
			M('Book')->where("id=$id")->save($data);
			$this->ajaxReturn(1,'修改信息成功！',1);

		}else {
			$this->ajaxReturn(0,'请选择要修改的选项！',0);
		}
	}
	public function deleteBase($model){
		if (!empty($_POST['id'])){
			M($model)->where("id=%d",$_POST['id'])->delete();
			$this->ajaxReturn(1,'删除成功！',1);
		}else {
			$this->ajaxReturn(0,'删除失败！',0);
		}
	}
	public function deleteBook(){
		$this->deleteBase("Book");
	}
	
	public function addBookView(){
		$this->display('addBookView');
	}
	
	public function addBook(){
		if (empty($_POST['bookID']) || empty($_POST['author']) || empty($_POST['publishHouse']) || empty($_POST['from']) ||empty($_POST['name']) ) {
			$this->ajaxReturn(0,'输入不能为空',0);
		}else {
			$data = array(
					'isbn' => $_POST['isbn'],
					'bookID' => $_POST['bookID'],
					'author' => $_POST['author'],
					'name' => $_POST['name'],
					'publishHouse' => $_POST['publishHouse'],
					'images' => $_POST['images'],
					'from' => $_POST['from'],
					'status' => 1,
					'birthday' => date('Y-m-d H:i:s'),
			);
		
			if (D('Book')->add($data)) {
				$this->ajaxReturn(1,'增加成功！',1);
			}else {
				$this->ajaxReturn(0,'增加失败！',2);
			}
		}
	}
	
	public function borrowStatusView(){
		$this->pageBase("Borrow", "borrowStatusView","ret_time");
	}
	
	public function deleteRecord(){
		$this->deleteBase("Borrow");
	}
	
	public function qrcodeView(){
		$this->display('qrcodeView');
	}
	public function qrcode(){
		vendor("phpqrcode.phpqrcode");
		$data = $_POST['data'];
		// 纠错级别：L、M、Q、H
		$level = 'L';
		// 点的大小：1到10,用于手机端4就可以了
		$size = 4;
		// 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
		$path = "Public/Images/";
		// 生成的文件名
		$fileName = $path.$size.'.png';
		
		QRcode::png($data, $fileName, $level, $size);
		$this->ajaxReturn($fileName,'生成成功！',1);
	}
	
	public function tips(){
		$this->display("tips");
	}
}