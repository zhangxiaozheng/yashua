<?php
namespace admin\controller;
use admin\model\User;
class User extends controller
{
	protected $user;
	public function __construct()
	{
		$this->user = new User();
	}
	// public function login()
	// {
	// 	$username = $_POST['name'];
	// 	//var_dump($_POST);
	// 	$this->user->root($username);
	
	// 	$this->display();
	// } 

	
}