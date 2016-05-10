<?php

//ERROR REPORTING
error_reporting(E_ALL);
ini_set('display_errors', 'true');

//DOCTRINE LOADING
require_once 'vendor/autoload.php';
//use Doctrine\ORM\Tools\Setup;
//use Doctrine\ORM\EntityManager;

//CLASS LOADING
function autoload_model($class){
	$path = 'model/' . $class . '.php';
	(file_exists($path)) ? include_once($path) : null ;
}
function autoload_view($class){
	$path = 'view/' . $class . '.php';
	(file_exists($path)) ? include_once($path) : null ;
}
function autoload_entities($class){
	$path = 'entities/' . $class . '.php';
	(file_exists($path)) ? include_once($path) : null ;
}
spl_autoload_register("autoload_model");
spl_autoload_register("autoload_view");
spl_autoload_register("autoload_entities");
//use Bootrine\Reglog;
//use Bootrine\UserRepository;
//use Bootrine\User;

//MAIN CONFIGS
//PAGE
define("PAGE_NAME", 		"Bootrine");
define("PAGE_AUTHOR", 		"Kusi und Hirschi GmbH");
define("PAGE_DESCRIPTION", 	"So eine Seite zum Testen von Bootstrap und Doctrine");
define("PAGE_TAGS", 		"Kusi, Hirschi, Doctrine, Bootstrap");
//DATABASE
define("DB_URL", 			"localhost");
define("DB_USER", 			"root");
define("DB_PASSWORD", 		"");
define("DB_SCHEMA", 		"bootrine");
//DEFAULT PATH
define("ROOT",				"/bootrine/");
//DOCTRINE
define('ENTITY_PATH', 		ROOT . "entities");

//TEST DATABASE CONNECTION
try{
	Manager::get()->getConnection()->connect();
}catch(Exception $e){
	die("ENTITY MANAGER CANNOT CONNECT TO DATABASE");
}

//SESSION
session_start();

//SET SECURE PAGES
Paging::getInstance()->setSecurePages(array(
	//TBD
));