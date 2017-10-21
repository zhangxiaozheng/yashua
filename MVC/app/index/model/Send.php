<?php
namespace index\model;
use framework\Model;
class Send extends Model
{
	//回复插入数据库数据
	public function tianjia($data)
	{
		//var_dump($data);
		$insert = $this->insert($data);
		return $insert;
	}
	//回复帖子
	public function neirong($id)
	{
		//var_dump($id);
		$neirong = $this->where("$id = pid")->select();

		return $neirong;
	}
	//首页最新评论
	public function new()
	{
		 $new = $this->order('addtime desc')->limit('3')->select();
		 //var_dump($new);
		 return $new;
		
	}

}