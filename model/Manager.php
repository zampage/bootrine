<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Manager
{

	private static $entityManager;

	public static function get(){
		if(!self::$entityManager){
			self::$entityManager = EntityManager::create(array(
					'driver'	=> 'pdo_mysql',
					'user'		=> DB_USER,
					'password'	=> DB_PASSWORD,
				    'dbname'	=> DB_SCHEMA,
			    	'host'		=> DB_URL,
				), Setup::createAnnotationMetadataConfiguration(
					array(ENTITY_PATH),
					false
				)
			);
		}
		return self::$entityManager;
	}

}