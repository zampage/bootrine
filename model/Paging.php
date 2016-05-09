<?php

class Paging
{

	private static $instance;
	private $fourofour = "404";
	private $home = "home";

	public static function getInstance(){
		if(!self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function findPages(){
		
		$dir = "view/";
		$files = array_diff(scandir($dir), array('..', '.'));
		for($i = 0; $i < count($files); $i++){
			$f =& $files[$i];
			$temp = explode('.', $f);
			unset($temp[count($temp) - 1]);
			$f = implode('.', $temp);
		}
		return $files;

	}

	public function find($get){

		$page;
		$path;
		$dir = "view/";
		$files = $this->findPages();
		
		//SEE IF GET EXISTS
		if(isset($get['page'])){
			$page = $get['page'];
		}else{
			$page = $this->home;
		}

		//SEE IF FILE EXISTS
		if(!in_array($page, $files)){
			$page = $this->fourofour;
		}

		//ADD DIR
		$page = $dir . $page;

		//LOAD FILE (PHP FIRST)
		if(file_exists($page . '.php')){
			return $page . '.php';
		}else if(file_exists($page . '.html')){
			return $page . '.html';
		}else{
			die("INVALID PAGING");
		}

	}

}