<?php
/**
 * provide api like search, borrow,return and so on
 * @author hang
 *
 */
class AdminAction extends CommonAction {
	public function init(){
		/**
		 *  
			为了防止别人反编译或者通过其他抓包的方式得到接口，得到接口之后向数据库乱写入数据。特定义这个初始化函数，要求客户端每次调用接口的时候必须把当前登录用户的name值和password的md5值发过来
			如果首先这个验证失败，则不予提供接口服务。
		 */
		$name = I('name','','htmlspecialchars');
		if (!isset($_SESSION['$name'])) {
			$output = array('status' => -1, 'info'=>'请登录！', 'code' => 11900);
			exit (json_encode($output));
		}
	}
	public function borrowBook(){
		/**
			api for borrow books.
		 */
		$this->init();
		$data = array(
				'bookID' => I('bookID','','htmlspecialchars'),
				'reader' => I('name','','htmlspecialchars'),
				'bor_time' => date('Y-m-d H:i:s'),
				'ret_time' => '',
				'status' => 1,   // 1 stands for in this table
		);
		if (D('Borrow')->add($data)) {    // 先这么写着，写完之后查一下php事务回滚看能不能改写一下
			D('Book')->where("bookID=%s ",$data["bookID"])->setField('status',0);
			$output = array('status' => 1,'info'=>'借书成功', 'code' => 11902);
			echo json_encode($output);
		}else {
			$output = array('status' => -1, 'info'=>'借书失败', 'code' => 11907);
			echo json_encode($output);
		}	
		
	}
	
	public function returnBook(){
		/**
		 api for return books.
		 
		 */
		$this->init();
		$bookID = I('bookID','','htmlspecialchars');
		$reader = I('name','','htmlspecialchars');
		$result = D('Borrow')->where("bookID=%s and reader=%s and status=%d",$bookID,$reader,1)->select();
		if (empty($result)){
			$output = array('status' => -1, 'info'=>'还书失败，请用借书人的账户还书', 'code' => 11907);
			echo json_encode($output);
		} else {
		$data = array('status' => 0,'ret_time' => date('Y-m-d H:i:s'));
		$res1 = D('Borrow')->where("bookID=%s",$bookID)->setField($data);
		$res2 = D('Book')->where("bookID=%s",$bookID)->setField('status', 1);
		
		if ($res1 && $res2) {
			$output = array('status' => 1, 'info'=>'还书成功！', 'code' => 11902);
			echo json_encode($output);
		}else {
			$output = array('status' => 0, 'info'=>'还书失败', 'code' => 11903);
			echo json_encode($output);
		}
	  }
	}
	
	public function borrowStatus() {
	/**
	 api for borrow status of the reader.
	 当前借阅，此接口无需提供用户名和密码即可提供服务
	 */
	 $reader = I('reader','','htmlspecialchars');
	 $res = D('Borrow')->where("reader=%s and status=%d",$reader,1)->select();
	 echo json_encode($res);
    }	
    
    public function borrowHistory(){
    	/**
    	 api for borrow history of the reader.
    	 */
    	$reader = I('reader','','htmlspecialchars');
    	$res = D('Borrow')->where("reader=%s and status=%d",$reader,0)->select();
    	echo json_encode($res);
    }
    
    public function addBook(){
    	/**
    	 * API：http://localhost/zendStudio/library/index.php/Api/Admin/addBook?isbn=9787555201138&bookID=TP312&from=%E5%BE%90%E6%AC%A2%E6%AC%A2&name=pp&password=pp
    	 * 
    	 */
    	header("Content-type: text/html; charset=utf-8");
    	$output = array();
    	$ch = curl_init();
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false); //设置访问https
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //设置保存在字符串中而不是显示在屏幕
		$isbn = I('isbn','','htmlspecialchars');	  //获取客户端传过来的值
		
		$this->init();
		 
			curl_setopt($ch, CURLOPT_URL, "https://api.douban.com/v2/book/isbn/".$isbn);
			curl_setopt($ch, CURLOPT_HEADER, 0);
		
			// 抓取URL并把它传递给浏览器
			$res = curl_exec($ch);
			$res = json_decode($res,true);
			if (isset($res['msg'])){
				$output = array('status' => 0, 'info'=>'ISBN不存在！', 'code' => 11901);
				exit(json_encode($output));
			} else {							// api调用完毕，数据已获取，现在开始入库
				$bookID = I('bookID','','htmlspecialchars');
				$from = I('from','','htmlspecialchars');
				$data = array(
						'bookID' => $bookID,
						'author' => $res['author'][0],
						'name' => $res['title'],
						'publishHouse' => $res['publisher'],
						'images' => $res['images']['large'],
						'from' => $from,
						'status' => 1,
						'isbn' => $isbn,
						'birthday' => date('Y-m-d H:i:s'),
				);
				if (D('Book')->add($data)) {
					$output = array('status' => 1, 'info'=>'新增书目成功！请前往web版设置捐书人等信息', 'code' => 11902);
					echo json_encode($output);
				}else {
					$output = array('status' => 2, 'info'=>'新增失败！', 'code' => 11903);
					echo json_encode($output);
				}
			
			curl_close($ch);
      }
    }
}




