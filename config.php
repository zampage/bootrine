<?php

//ERROR REPORTING
error_reporting(E_ALL);
ini_set('display_errors', 'true');

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

//DOCTRINE LOADING
require_once 'vendor/autoload.php';

//CONFIGS
define("PAGE_NAME", "Bootrine");
define("AUTHOR", "Kusi u hirschi");
