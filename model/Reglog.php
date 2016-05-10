<?php

class Reglog
{

	public static function redirectOnInvalidAccess($page = 'login'){
		$valid = self::check();
		if(!$valid){
			header('location:' . $page);
			exit();
		}
	}

	public static function check(){
		
		if(isset($_SESSION['user'])){

			$user = Manager::get()
				->getRepository('User')
				->findSessionUser();

			if($user && $user[0]['username'] == $_SESSION['user']['username']){
				return true;
			}

		}

		return false;

	}

	public static function login($username, $password){

		$user = Manager::get()
			->getRepository('User')
			->findLoginUser($username, $password);

		if($user){
			$_SESSION['user'] = $user[0];
			return true;
		}else{
			return false;
		}

	}

	public static function register($username, $password){
		
		$username = htmlspecialchars($username);
		$password = md5($password);

		$user = new User();
		$user->setUsername($username);
		$user->setPassword($password);

		Manager::get()->persist($user);
		Manager::get()->flush();

	}

}