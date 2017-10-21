<?php
namespace admin\model;
use framework\Model;
class Send extends Model
{
	//查询留言
	public function yan()
	{
	 $yan = $this->select();
     //var_dump($yan);
     return $yan;
	}
//删除留言
	public function del($data)
	{
		$del = $this->where("tid in ($data)")->delete();
		return $del;
	}	
	//分页
	 public function getCount()
	{
		return $this->count();
		 
	} 
	
}