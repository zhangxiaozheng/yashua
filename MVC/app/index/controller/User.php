<?php
namespace index\controller;
use index\model\User as UserModel;
use framework\Verify;
class User extends Controller
{
	protected $user;
	public function __construct()
	{
		parent::__construct('app/index/view/', 'cache/user');
		$this->user = new UserModel();

	}
	public function regist()
	{	 
		if (!empty($_POST)) {
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 	$username = trim($_POST['username']);
		 	$password = trim($_POST['password']);
		 	$rpassword = trim($_POST['rpassword']);
		 	$phone = $_POST['phone'];
		 	$yzm = $_POST['yzm'];
		 	if (strlen($username) < 5) {
		 		$info = '用户名至少5位';
		 		$this->notice($info);die;
		 	}else{
		 		$data['username'] = $username;
		 	}
		 	//判断密码
		 	if(strlen($password) < 5){
		 		$info = '密码长度不能小于5位长度';
		 		$this->notice($info);die;
		 	} elseif(strcmp($password, $rpassword)){
		 		$info = '输入两次密码不一致';
		 		$this->notice($info);die;
		 	} else{
		 		$data['password'] = md5($password);
		 	}
		 	//判断手机号
		 	// $g = "/^1[34578]\d{9}$/"; 
		 	// if ($phone != $g) {
		 	// 	$info = '手机格式不正确';
		 	// 	$this->notice($info);die;
		 	// }else{
		 	// 	$data['phone'] = $phone;
		 	// }
		 	if(preg_match("/^1[34578]\d{9}$/", $phone)){

		 		$data['phone'] = $phone;

			 		} else{
			 			$info = '手机格式不正确';
		 		      $this->notice($info);die;
			 		}


		 	//判断验证码
			if (strcasecmp($_SESSION['code'], $yzm)) {
				$info = '验证码输入错误';
				$this->notice($info);die;
			}
			//获取ip地址
			$ip = $_SERVER['REMOTE_ADDR'];
			if($ip == '::1'){
				$ip = '127.0.0.1';
			}
			// $data['phone'] = $phone;
			$data['IP'] = ip2long($ip);
			$data['undertype'] = 0;
			$data['regtime'] = time(); 
			//var_dump($data);
		 	$insert = $this->user->registDeal($data);
		 	//判断用户
		 	//var_dump($insert);//die;
			// if(!empty($insert)){
			// 	$_SESSION['username'] = $data['username'];
			// 	$_SESSION['undertype'] = $data['undertype'];
			// 	$info = '注册成功';
			// 	$this->notice($info,'index.php');die;
			// } else{
			// 	$info = '注册shibai';
			// 	$this->notice($info);die;
			// }
		 }

		}

		$this->display();
	}

	public function login()
	{
		if (!empty($_POST)) {
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 	$username = trim($_POST['username']);
		 	$password = trim($_POST['password']);
		 	$password = MD5($password);
		    $add = $this->user->loginDeal($username);
		    //var_dump($add);die;
		    if(!empty($add)){
		    	 if (strcmp($add[0]['password'], $password)) {
		    	$this->notice('密码错误');die;
		    }else{
		    	$_SESSION['username'] = $username;
				$_SESSION['undertype'] = $add[0]['undertype'];	
		    	$this->notice('登陆成功','index.php');die;
		    }
		    } else{
		    	$this->notice('用户名不存在');die;
		    }

		   }
		}
		$this->display();
	}
	//修改密码
	public function pass()
	{
		 if ($_POST['password'] != $_POST['rpassword']){
	     echo '<script>alert("两次密码不一致");location.href="index.php?m=index&c=index&a=pass"</script>';
      }else{
      		if(!empty($_POST['tijiao'])){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$oldpassword = trim($_POST['oldpassword']);
				$newpassword = trim($_POST['password']);
				$uname = $_SESSION['username'];
				$pass = $this->user->pass($uname);
				if($pass[0]['password'] == md5($oldpassword)){
					// 加密新密码
					$a = MD5($newpassword);
					$data['password'] = $a;
					$admin = $this->user->xiu($uname, $data);
					if ($admin) {
					 	echo '<script>alert("修改密码成功");location.href="index.php?m=index&c=index&a=index"</script>';
					} else {
						echo '<script>alert("修改密码失败");location.href="index.php?m=index&c=index&a=pass"</script>'; 
					}
			         	}else{
			         		echo '<script>alert("原始密码不正确");location.href="index.php?m=index&c=index&a=pass"</script>';
			         	}

			     }
		     }

      }
			

	}
	public function exit()
	{
		unset($_SESSION);//销毁session
		session_destroy();//销毁服务器上的session
		if(empty($_SESSION)){
			$info = '退出成功';
			$this->notice($info, 'index.php');
		} else{
			$info = '退出失败';
			$this->notice($info, 'index.php');
		}


		$this->display();
	}

	public function verify()
	{
		$code = Verify::ver();
		//将验证码存在session里
		$_SESSION['code'] = $code;

	}
}