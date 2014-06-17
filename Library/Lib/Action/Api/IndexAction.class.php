<?php
/**
 * supply some interface like login and so on for android
 * @author hang
 *
 */
class IndexAction extends Action {
	public function login(){
		header("Content-type: text/html; charset=utf-8");
// 		if (!IS_GET) {
// 			_404('页面不存在',U('Admin/Index/index'));;
// 		}
	/**
API: http://localhost/zendStudio/library/index.php/Api/Index/login.html?username=pp&password=pp
	 */
		$data = array(
				'username' => I('username','','htmlspecialchars'),
				'password' => md5(I('password','','htmlspecialchars')),
		);
		$arr = array(
				status => '0',  // 登录成功与否.0代表失败，1代表成功。
				info => 'bad request', //2009
		);
		//echo $arr['session'];
		$res = M('User')->where("name='%s' and	password='%s'",$data)->select();
		if (!empty($res)) {
			session_start();
			//ini_set("session.cookie_lifetime","5");
			$_SESSION[$res[0]['name']] = $res[0]['name'];
			$_SESSION[$res[0]['password']] = $res[0]['password'];
			$arr["status"] = 1;
			$arr["info"] = "login success";
			echo json_encode($arr);
		}else {
			echo json_encode($arr);
		}
	}
	
	public function loginAdmin(){
		// 		if (!IS_GET) {
		// 			_404('页面不存在',U('Admin/Index/index'));
		// 		}
		/**
		 API: http://localhost/zendStudio/library/index.php/Api/Index/login.html?username=pp&password=pp
		 */
		$data = array(
				'username' => I('username','','htmlspecialchars'),
				'password' => md5(I('password','','htmlspecialchars')),
		);
		$arr = array(
				status => '0',  //登录成功与否.0代表失败，1代表成功。
				info => '登录失败', //2009
		);
		$res = M('Admin')->where("name='%s' and	password='%s'",$data)->select();
		if (!empty($res)) {
			session_start();
			$_SESSION[$res[0]['name']] = $res[0]['name'];
			$_SESSION[$res[0]['password']] = $res[0]['password'];
			$arr["status"] = 1;
			$arr["info"] = "登录成功！";
			echo json_encode($arr);
		}else {
			echo json_encode($arr);
		}
	}
	
	public function loginView(){
		$this->display('login');
	}
	

}