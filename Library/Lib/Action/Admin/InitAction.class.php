<?php
class InitAction extends Action{
	public function _initialize(){
		session_start();
		if (!isset($_SESSION['userName']) || !isset($_SESSION['userPwd'])) {
			$this->redirect('Admin/Index/index');
		}
	}
}