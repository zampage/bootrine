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

	public static function displayAllGallerys(){

		$grepo = Manager::get()->getRepository('Gallery');
		$galleries = $grepo->findAll();

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

	public static function displayGallery($id) {
		$grepo = Manager::get()->getRepository('Gallery');
		$galleries = $grepo->findBy(array('gid' => $id));

		if($galleries){
			foreach($galleries AS $g){
				$g->display();
			}
		}
	}

}