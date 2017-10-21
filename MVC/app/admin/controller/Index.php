<?php
namespace admin\controller;
use admin\model\user;
use admin\model\post;
use admin\model\send;
use framework\Page;
class Index extends Controller
{
	 protected $post;
	 protected $user; 
	 protected $send; 
	 public function __construct()
	{	
		$this->post = new post();
		$this->user = new user();
		$this->send = new send();
		parent::__construct();
	} 
	public function index()
	{
		$this->display();
	}
	//修改站点信息
	public function info()
	{

		//获取站点信息
		$web = include "./vendor/zhan/link.php"; 
		$this->assign('web', $web);
		if (!empty($_POST)) {
		    $arr['WEB_NAME'] = empty($_POST['title']) ? '' : $_POST['title']; 
		    $arr['WEB_LOGO'] = empty($_POST['stitle'])?'':$_POST['stitle']; 
		    $arr['WEB_ZHIYE'] = empty($_POST['work'])?'':$_POST['work']; 
		    $arr['WEB_EMAIL'] = empty($_POST['phone'])?'':$_POST['phone']; 
		    $arr['WEB_PHONE'] = empty($_POST['email'])?'':$_POST['email']; 
		    $content = "<?php \n return " . var_export($arr,true) . ";";
		    file_put_contents("./vendor/zhan/link.php", $content); 
		    echo '<script>alert("修改站点信息成功");location.href="index.php?m=admin&c=index&a=info"</script>';
		 }
		$this->display();
	}
	//修改管理员密码
	public function pass()
	{	
		if(!empty($_POST['submit'])){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$oldpassword = trim($_POST['mpass']);
				$newpassword = trim($_POST['newpass']);
				$uname = $_SESSION['username'];
				$pass = $this->user->pass($uname);
				if($pass[0]['password'] == md5($oldpassword)){
					// 加密新密码
					$a = MD5($newpassword);
					$data['password'] = $a;
					$admin = $this->user->xiu($uname, $data);
					if ($admin) {
					 	echo '<script>alert("修改密码成功");location.href="index.php?m=admin&c=index&a=pass"</script>';
					} else {
						echo '<script>alert("修改密码失败");location.href="index.php?m=admin&c=index&a=pass"</script>'; 
					}
			         	}else{
			         		echo '<script>alert("原始密码不正确");location.href="index.php?m=admin&c=index&a=pass"</script>';
			         	}

			     }
		}
		

		//var_dump($_POST);
		$this->display();
	}
	
	public function book()
	{
		// $bok = $this->user->bok();
		// foreach ($bok as $key => $value) { 
		// }
		//删除用户
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			if(!empty($_POST['id'])){
			$id = $_POST['id'];
			 $data = implode(',',$id);
			  
			$delete = $this->user->del($data);
			if($delete){
				echo '<script>alert("删除成功");location.href="index.php?m=admin&c=index&a=book"</script>';
			}else{
				echo '<script>alert("删除失败");location.href="index.php?m=admin&c=index&a=book"</script>';
				}
			}
		}

		$total = $this->user->getCount();
		$perpage = 4;
		$this->page = new Page($total['count'], $perpage);
		$p = $this->page->page();
		$select = $this->user->limit($p['limit'])->select();
		//var_dump($p);
		$first = $p['firstUrl'];
		$next = $p['nextUrl'];
		$prev = $p['prevUrl'];
		$end = $p['endUrl'];
		//分配变量到前台
        $this->assign('total',$total);
		$this->assign('perpage',$perpage);
		$this->assign('p',$p);
		$this->assign('first',$first);
		$this->assign('prev',$prev);
		$this->assign('next',$next);
		$this->assign('end',$end);
		$this->assign('select',$select);

		// $this->assign('bok',$bok);
		$this->display();
	}
	//删除博文
	public function column()
	{

		//var_dump($_POST);
		// $tie = $this->post->tie();
		//删除帖子
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			if(!empty($_POST['id'])){
			 $id = $_POST['id'];
			 //var_dump($id);
			 $data = implode(',',$id);
			 var_dump($data);
			 $delete = $this->post->del($data);
			if($delete){
				echo '<script>alert("删除博文成功");location.href="index.php?m=admin&c=index&a=column"</script>';
			}else{
				echo '<script>alert("删除博文失败");location.href="index.php?m=admin&c=index&a=column"</script>';
				}
			}
		}

		$total = $this->post->getCount();
		$perpage = 4;
		$this->page = new Page($total['count'], $perpage);
		$p = $this->page->page();
		$select = $this->post->limit($p['limit'])->select();
		//var_dump($p);
		$first = $p['firstUrl'];
		$next = $p['nextUrl'];
		$prev = $p['prevUrl'];
		$end = $p['endUrl'];
		//分配变量到前台
        $this->assign('total',$total);
		$this->assign('perpage',$perpage);
		$this->assign('p',$p);
		$this->assign('first',$first);
		$this->assign('prev',$prev);
		$this->assign('next',$next);
		$this->assign('end',$end);
		$this->assign('select',$select);
		// $this->assign('tie', $tie);
		$this->display();
	}
	//留言管理
	public function list()
	{
		//$yan = $this->send->yan();
		if(!empty($_POST['id'])){
			$id = $_POST['id'];
			$data = implode(',', $id);
			$delete = $this->send->del($data);
			if ($delete) {
				echo '<script> alert("删除留言成功");location.href="index.php?m=admin&c=index&a=list"</script>';
			}else{
				echo '<script> alert("删除留言失败");location.href="index.php?m=admin&c=index&a=list"</script>';
			}
		}
		//分页
		$total = $this->send->getCount();
		$perpage = 4;
		$this->page = new Page($total['count'], $perpage);
		$p = $this->page->page();
		$select = $this->send->limit($p['limit'])->select();
		//var_dump($p);
		$first = $p['firstUrl'];
		$next = $p['nextUrl'];
		$prev = $p['prevUrl'];
		$end = $p['endUrl'];
		//分配变量到前台
        $this->assign('total',$total);
		$this->assign('perpage',$perpage);
		$this->assign('p',$p);
		$this->assign('first',$first);
		$this->assign('prev',$prev);
		$this->assign('next',$next);
		$this->assign('end',$end);
		$this->assign('select',$select);
		//分配变量到前台
		//$this->assign('yan', $yan);
		$this->display();
	}
	public function add()
	{
		$this->display();
	}
	
 }