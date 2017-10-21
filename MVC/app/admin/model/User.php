<?php
namespace admin\model;
use framework\Model;
class User extends Model
{
	public function getInfo()
	{
		return $this->select();
	}
	public function bok()
	{

		$bok = $this->select();
		
		return $bok;
	}
	public function del($data)
	{
		$dele = $this->where("u_uid in ($data)")->delete();
		return $dele;
	}
	public function pass($uname)
	{
		 
		$old = $this->where("username = '$uname'")->select();
		return $old;
	}
	
	public function xiu($uname, $data)
	{
		$admin = $this->where("username = '$uname'")->update($data);
		return $admin;
	}
	//分页
	 public function getCount()
	{
		return $this->count();
		 
	}
}