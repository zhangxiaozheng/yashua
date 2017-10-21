<?php
namespace index\model;
use framework\Model;

class POST extends Model
{
	public function getInfo()
	{
		return $this->select();
	}
	public function fabiao($data)
	{
			//var_dump($data);
			$insert = $this->insert($data);
			//var_dump($insert);
			return $insert;
	}
	public function info()
	{
		$select = $this->select();
	    return $select; 

	} 
	public function getCount()
	{
		return $this->count();
		 
	}

	public function read($id)
	{
		return $this->where('id='.$id)->select();
	}
	//点赞查询
	public function dian($id)
	{
		return $this->where('id='.$id)->select();

	}
	public function xiu($id,$data)
	{	
		$id = $id;
		var_dump($id);
		var_dump($data);
		$this->where('id='.$id)->update($data);
	}
	//浏览
	public function hit($id, $data)
	{
		$id = $id;
		return $this->where('id='.$id)->update($data);
	} 
	//收藏查询
	public function cha($id)
	{
		return $this->where('id='.$id)->select();

	}
} 