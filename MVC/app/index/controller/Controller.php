<?php
namespace index\controller;
use framework\Template;
class Controller extends Template
{
	public function __construct()
	{
		parent::__construct('app/index/view/', 'cache/index');
	}
	public function display($tplFile = null, $isExcute = true)
	{
		if (is_null($tplFile)) {
			$tplFile = $_GET['c'] . '/' .$_GET['a'] . '.html';
		} else {
			$tplFile = $_GET['c'] . '/' .$tplFile;
		}
		
		parent::display($tplFile, $isExcute);
	}

	public function notice($msg, $url = null, $second = 300)
	{
		if (empty($url)) {
			//跳转到上一级目录
			$url = $_SERVER['HTTP_REFERER'];
		}
		$this->assign('msg', $msg);
		$this->assign('url', $url);
		$this->assign('second', $second);
		$this->display('notice.html');

	}
	
}
