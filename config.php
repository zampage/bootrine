<?php

//ERROR REPORTING
error_reporting(E_ALL);
ini_set('display_errors', 'true');

//DOCTRINE LOADING
require_once 'vendor/autoload.php';

//CLASS LOADING
//setup autoload functions
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
//register autoload functions
spl_autoload_register("autoload_model");
spl_autoload_register("autoload_view");
spl_autoload_register("autoload_entities");
//load controller manually
require_once('controller.php');

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
//PATHS
define("ROOT_BASE", "C:\\xampp\htdocs\\");
define("ROOT",				"/github/bootrine/");
define("ENTITY_PATH", 		"entities");
define("IMAGES_PATH",		ROOT . "images/");

//SESSION
session_start();

//SET SECURE PAGES
Paging::getInstance()->setSecurePages(array());