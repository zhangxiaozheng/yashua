<?php
namespace index\controller;
use index\model\POST as POSTModel;
class POST extends Controller
{
	protected $post;
	public function __construct()
	{
		parent::__construct('app/index/view/', 'cache/post');
		$this->post = new PostModel();

	}
	public function list()
	{	
		if (!empty($_SESSION['username'])) {
		  	 if(!empty($_POST['tijiao']))
				{
					if(empty($_POST['title'])){
						$info = '发表文章的标题不能为空';
						$this->notice($info);die;
					}
					if(empty($_POST['content'])){
						$info = '发表文章的内容不能为空';
						$this->notice($info);die;
					}
					$title = $_POST['title'];
					$content = $_POST['content'];
					$addtime = time();
					$addip = $_SERVER['REMOTE_ADDR'];
					if($addip == '::1'){
						$addip = '127.0.0.1';
					}
					$authorid = $_SESSION['username'];
			        $data['addip'] = ip2long($addip);
			        $data['authorid'] = $authorid;
			        $data['addtime'] = $addtime;
			        $data['content'] = $content;
			        $data['title'] = $title;
			        $insert = $this->post->fabiao($data);
			        if($insert){
			        	$info = '发表文章成功';
			        	$this->notice($info, 'index.php');
			        } else{
			        	$ifo = '发表文章失败';
			        	$this->notice($info, 'index.php');
			        }

				}
		 } else{
		 	$info = '请登陆后在发表';
		 	$this->notice($info,'index.php');die;
		 }

	}	

 
	
}