<?php
namespace index\controller;
use index\model\User as UserModel;
use index\model\Post as PostModel;
use index\model\Send as SendModel;
class Send extends Controller
{
	protected $user;
	protected $post;
	protected $send;
	public function __construct()
	{
		parent::__construct('app/index/view/', 'cache/user');
		$this->user = new UserModel();
		$this->post = new PostModel();
		$this->send = new SendModel();

	}
	public function huifu()
	{

		if(!empty($_SESSION['username'])){
			$id = $_POST['id'];
			$username = $_SESSION['username'];
			$content = $_POST['txt'];
			$authorid = $username;
			$addtime = time();
			$pid = $id;
		 	$data['pid'] = $pid;
		 	$data['addtime'] = $addtime; 
		 	$data['authorid'] = $authorid; 
		 	$data['content'] = $content; 
		 	//var_dump($data);die;
			$tianjia =  $this->send->tianjia($data);
			$info = '回复成功';
			$this->notice($info,"index.php?m=index&c=index&a=index");
		}else{
			$info = '请登录后在回复';
			$this->notice($info,"index.php?m=index&c=user&a=login");
		}
		
		
	}
	
}