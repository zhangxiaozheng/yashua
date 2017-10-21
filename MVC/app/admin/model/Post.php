<?php
namespace admin\model;
use framework\Model;
class Post extends Model
{
//查询帖子
	public function tie()
	{
		 $tie = $this->select();
		return $tie;

	}
	// 删除帖子
	public function del($data)
	{
		$dele = $this->where("id in ($data)")->delete();
		return $dele;
	}
	//分页
	 public function getCount()
	{
		return $this->count();
		 
	}
}