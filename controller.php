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

				$imgs = $g->getImages();

				echo '<div class="col-md-4 col-sm-6 col-xs-12">';
				echo '<a href="gallery/' . $g->getGid() . '" class="thumbnail">';
				echo '<div class="image-holder">';
				if(count($imgs) > 0){
					echo '<img src="' . IMAGES_PATH . $imgs[0]->getPath() . '">';
				}
				echo '</div>';
				echo '</a>';
				echo '<a href="gallery/' . $g->getGid() . '">';
				echo '<h3>' . $g->getName() . '&nbsp;<small>by ' . $g->getUser()->getUsername() . '</small></h3>';
				echo '</a>';
				echo '</div>';

			}
		}

	}

}