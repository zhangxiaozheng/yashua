<?php
namespace index\controller;
use index\model\User as UserModel;
use index\model\Post as PostModel;
use index\model\Send as SendModel;
use framework\Page;
class Index extends Controller
{	
	protected $page; 
	protected $post;
	protected $send;
	public function __construct()
	{
		parent::__construct('app/index/view/', 'cache/post');
		$this->post = new PostModel();
		$this->send = new SendModel();	
	}


	public function index()
	{
		//页面标题
		$this->assign('title', '落花忆无情');
		//分页
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
		//var_dump($p);
		//首页最新评论
		$new = $this->send->new();
		foreach ($new as $key => $value) {
			 
		}
		//获取站点信息
		$web = include "./vendor/zhan/link.php"; 
		$this->assign('web', $web);
		$this->assign('new', $new);


		$this->display();
		 
	}
	public function detail()
	{
		$this->display();
	}
	public function read()
	{
		$id = $_GET['id'];
		//var_dump($id);
		//阅读全文
		$read = $this->post->read($id);
		//浏览次数
		foreach ($read as $key => $value) {
			$hits = $value['hit'];
			$hits +=1;
			$data = ['hit' =>$hits];
			//var_dump($data);
			$this->post->hit($id,$data);
		}
		
		$neirong = $this->send->neirong($id);
		$this->assign('neirong',$neirong);
		$this->assign('read', $read);
		$this->assign('id', $id);
		$this->display();
	} 
	
	//点赞
	public function love()
	{
		if(!empty($_GET['id']))
		{	
		    $state = ($_GET['state']);	
			$id = $_GET['id'];
			$num = $this->post->dian($id);
			//var_dump($num);
			foreach ($num as $key => $value) {
				$smiley = ($value['smiley']);
			}
			 if ($state == 1) {
			 	$smiley +=1;
			  $data = ['smiley' => $smiley,'zan' => 1];
			 $update = $this->post->xiu($id,$data);
			 header('location:index.php');

			 }
			 if ($state == 2) {
			 	$smiley -=1;
			 $data = ['smiley' => $smiley,'zan' => 0];
			 $update = $this->post->xiu($id,$data);
			  header('location:index.php');
			 }	
		}	 
	} 
	//收藏
	public function xiao()
	{
		var_dump($_GET['stat']);
		if(!empty($_GET['id']))
		{	
		    $state = ($_GET['stat']);	//状态
			$id = $_GET['id'];          //帖子id
			$num = $this->post->cha($id); //帖子详情
			var_dump($num);
			$sollect = $num[0]['sollect'];
			
			 if ($state == 1) {
			 	$sollect +=1;
			  $data = ['coll' => 1,'sollect' => $sollect];
			 $update = $this->post->xiu($id,$data);
			header('location:index.php');

			 }
			 if ($state == 2) {
			 	$sollect -=1;
			 $data = ['sollect' => $sollect,'coll' => 0];
			 $update = $this->post->xiu($id,$data);
			 header('location:index.php');
			 }	
		}	 
	} 	

	public function pass()
	{
		$this->display();
	}
	
}