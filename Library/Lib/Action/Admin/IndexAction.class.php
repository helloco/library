<?php
/**
 * 
 * this is a management system for the small library in hgdonline.
 * @author hang
 *
 */
class IndexAction extends Action {
    public function index(){
	//$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    $this->display('index');
    }
    
	public function checkLogin(){
		if (!IS_POST)
			_404('页面不存在',U('index'));
		if($_SESSION['verify'] != md5($_POST['verify'])) {
			$this->error('验证码错误！');
		}
		$data = array(
				'adminName' => I('adminName','','htmlspecialchars'),
				'adminPwd' => md5(I('adminPwd','','htmlspecialchars')),
		);
		$Model = M('Admin');
		$res = $Model->where("name='%s' and password='%s'",$data)->select();
		if ($res) {
			session_start();
			session('userName',$res[0]['name']);
			session('userPwd',$res[0]['password']);
			session('id',$res[0]['id']);
			$this->redirect('/Admin/Admin/admin');
		}else {
			$this->error("用户名或者密码错误",'index');
		}
	}
	
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
	
}