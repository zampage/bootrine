<?php

class Paging
{

	private static $instance;
	private $fourofour = "404";
	private $home = "home";
	private $defaultPath = "view/pages/";
	private $securePages = array();

	public static function getInstance(){
		if(!self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function getSecurePages(){
		return $this->securePages;
	}

	public function setSecurePages($ar){
		$this->securePages = $ar;
	}

	public function findPages(){
		
		$dir = $this->defaultPath;
		$files = array_diff(scandir($dir), array('..', '.'));
		for($i = 0; $i < count($files); $i++){
			$f =& $files[$i];
			$temp = explode('.', $f);
			unset($temp[count($temp) - 1]);
			$f = implode('.', $temp);
		}
		return $files;

	}

	public function selectPage($get){

		$page;
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

		return $page;

	}

	public function getPagePath($page){
		//ADD DIR
		$dir = $this->defaultPath;
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

	public function checkGalleryAccess($gid){
		$gallery = Manager::get()->getRepository('Gallery')->find($gid);
		if($gallery->isPrivate()){
			if(Reglog::check()){
				$user = Manager::get()->getRepository('User')->find($_SESSION['user']['uid']);
				if($gallery->getUser() == $user){
					return true;
				}
			}
		}else{
			return true;
		}
		return false;
	}

}