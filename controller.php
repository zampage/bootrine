<?php

class Controller
{

	public static function handleContent(){

		$page = Paging::getInstance()->selectPage($_GET);

		if(in_array($page, Paging::getInstance()->getSecurePages())){
			Reglog::redirectOnInvalidAccess();
		}

		include( Paging::getInstance()->getPagePath($page) );

	}

	public static function handleGalleryContent(){
		if(isset($_GET["param"])) {
			if( Paging::getInstance()->checkGalleryAccess($_GET['param']) ){
				Controller::displayGallery($_GET["param"]);
			}else{
				if(Reglog::check()){
					//user not allowed in this gallery
					header('location:'.ROOT.'404');
				}else{
					//login to see gallery
					header('location:'.ROOT.'login');
				}
			}
		} else {
			//404 Gallery not found
			header("Location: ".ROOT."404");
			exit();
		}
	}

	public static function displayAllGallerys(){

		$grepo = Manager::get()->getRepository('Gallery');

		//FIND ALL PUBLIC GALLERYS AND ONLY MY OWN PRIVATE
		//(if logged in)
		if(Reglog::check()){
			$galleries = $grepo->findAllPublicAndOwnPrivate(
				Manager::get()->getRepository('User')->find(
					$_SESSION["user"]["uid"]
				)
			);
		}else{
			$galleries = $grepo->findAllPublic();
		}

		if($galleries){
			foreach($galleries AS $g){
				$g->displayThumb();
			}
		}

	}

	public static function addNewGallery($gname, $uid, $private = 0){

		$gname = htmlspecialchars($gname);
		$user = Manager::get()->getRepository('User')->find($uid);

		$gallery = new Gallery();
		$gallery->setName($gname);
		$gallery->setPrivate($private);
		$gallery->setUser($user);

		Manager::get()->persist($gallery);
		Manager::get()->flush($gallery);

		return $gallery;

	}

	public static function displayGalleryInfo($id) {
		$gallery = Manager::get()->getRepository('Gallery')->find($id);
		if($gallery){
			$gallery->displayInfo();
		}
	}

	public static function displayGalleryImages($id) {
		$gallery = Manager::get()->getRepository('Gallery')->find($id);
		if($gallery){
			$gallery->displayImages();
		}
	}

	public static function getCurrentGallery($gid){
		$gallery = Manager::get()->getRepository('Gallery')->find($gid);
		if($gallery){
			return $gallery;
		}
	}

	public static function isOwnGallery($gid){
		if(Reglog::check()){
			$user = Manager::get()->getRepository('User')->find($_SESSION['user']['uid']);
			$gallery = self::getCurrentGallery($gid);
			if($gallery->getUser() == $user){
				return true;
			}
		}
		return false;
	}

}