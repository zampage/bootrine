<?php

if(isset($_POST['action'])){

	require_once('config.php');

	if($_POST['action'] == 'addGallery'){

		$gallery = Controller::addNewGallery($_POST['gname'], $_SESSION['user']['uid']);
		$gallery->displayThumb();

	}

	if($_POST['action'] == 'uploadImage'){

		//TBD: UPDATE SECURITY
		$image = $_FILES['images'];
		for($i = 0; $i < count($image['name']); $i++){
			$name = explode('.', $image['name'][$i]);
			$path = uniqid().'-'.md5($image['name'][$i]).'.'.$name[count($name)-1];
			file_put_contents('images/'.$path, file_get_contents($image['tmp_name'][$i]));
			
			$gallery = Manager::get()->getRepository('Gallery')->find($_POST['gid']);
			
			$img = new Image();
			$img->setPath($path);
			$img->setGallery($gallery);

			Manager::get()->persist($img);
			Manager::get()->flush($img);

			echo $img->display();

		}

	}
}