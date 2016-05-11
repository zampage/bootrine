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

}