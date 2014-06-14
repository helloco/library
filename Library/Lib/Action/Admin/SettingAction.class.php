<?php
class SettingAction extends InitAction {
	
	public function alterAccountView() {
		$this->display('alterAccountView');
	}
	public function alterAccount(){
		if (empty($_POST['username']) || ($_POST['pwd'] !=$_POST['pwd2'])) {
			$this->error("输入有误",'alterAccountView');
		}else {
			$data = array(
				'name' => $_POST['username'],
				'password' => md5($_POST['pwd']),	
			);
			D('Admin')->where("id=%d",$_SESSION['id'])->save($data);
			$this->success('修改成功！','alterAccountView');
		}
	}
	public function logout(){
		session('userName',null);
		session('userPwd',null);
		$this->redirect('/Admin/Index/index');
	}
}