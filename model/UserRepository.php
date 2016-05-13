<?php

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{

	public function findSessionUser(){

		return Manager::get()
				->createQuery('SELECT u.username FROM User u WHERE u.uid=:uid')
				->setParameter(':uid', $_SESSION['user']['uid'])
				->getResult();

	}

	public function findLoginUser($username, $password){

		return Manager::get()
			->createQuery('SELECT u.uid, u.username FROM User u WHERE u.username=:u AND u.password=:p')
			->setParameter(':u', $username)
			->setParameter(':p', md5($password))
			->getResult();

	}

}