<?php
namespace index\model;
use framework\Model;

class User extends Model
{
	public function getInfo()
	{
		return $this->select();
	}
	public function registDeal($data)
	{
			//连接数据库插入数据
			// $username = $data['username'];
			// $re = $this->where("username = '$username'")->select();

			// if (!empty($re)) {
			// 	$info = '用户名重复';
			// }
			//var_dump($data);
			$insert = $this->insert($data);
			return $insert;
	}
	public function loginDeal($username)
	{	

		$user = $this->where("username = '$username'")->select();
		//var_dump($user);
		return $user;
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
}