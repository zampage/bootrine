<?php

if(isset($_POST['action'])){

	require_once('config.php');

	if($_POST['action'] == 'addGallery'){

		$gallery = Controller::addNewGallery($_POST['gname'], $_SESSION['user']['uid']);
		$gallery->displayThumb();

	}

	if($_POST['action'] == 'uploadImage'){

		//TBD: UPDATE SECURITY
		foreach($_FILES AS $image){
			$name = explode('.', $image['name'][0]);
			$path = uniqid().'-'.md5($image['name'][0]).'.'.$name[count($name)-1];
			file_put_contents('images/'.$path, file_get_contents($image['tmp_name'][0]));
			
			$gallery = Manager::get()->getRepository('Gallery')->find($_POST['gid']);
			
			$img = new Image();
			$img->setPath($path);
			$img->setGallery($gallery);

			Manager::get()->persist($img);
			Manager::get()->flush($img);

			echo 

		}

	}
}