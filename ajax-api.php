<?php

if(isset($_POST['action'])){

	require_once('config.php');

	if($_POST['action'] == 'addGallery'){

		$gallery = Controller::addNewGallery($_POST['gname'], $_SESSION['user']['uid']);
		$gallery->displayThumb();

	}

	if($_POST['action'] == 'uploadImage'){

		$gallery = Manager::get()->getRepository('Gallery')->find($_POST['gid']);
		$user = Manager::get()->getRepository('User')->find($_SESSION['user']['uid']);

		//ONLY UPLOAD IF GALLERY IS OWNED BY SESSION USER
		if($gallery->getUser() == $user){

			//TBD: UPDATE SECURITY
			$image = $_FILES['images'];
			for($i = 0; $i < count($image['name']); $i++){
				$name = explode('.', $image['name'][$i]);
				$path = uniqid().'-'.md5($image['name'][$i]).'.'.$name[count($name)-1];
				file_put_contents('images/'.$path, file_get_contents($image['tmp_name'][$i]));
				
				$img = new Image();
				$img->setPath($path);
				$img->setGallery($gallery);

				Manager::get()->persist($img);
				Manager::get()->flush();

				echo $img->display();
			}

		}

	}

	if($_POST['action'] == 'saveGalleryEdit'){

		$name = htmlspecialchars($_POST['name']);
		$priv = ($_POST['priv'] == 1) ? 1 : 0;
		$gid = intval($_POST['gid']);

		$gallery = Manager::get()->getRepository('Gallery')->find($gid);
		$user = Manager::get()->getRepository('User')->find($_SESSION['user']['uid']);

		//ONLY UPLOAD IF GALLERY IS OWNED BY SESSION USER
		if($gallery->getUser() == $user){
			$gallery->setName($name);
			$gallery->setPrivate($priv);

			Manager::get()->persist($gallery);
			Manager::get()->flush();

		}

	}

	if($_POST['action'] == 'deleteGallery'){

		$gid = intval($_POST['gid']);
		$gallery = Manager::get()->getRepository('Gallery')->find($gid);
		$user = Manager::get()->getRepository('User')->find($_SESSION['user']['uid']);

		if($gallery->getUser() == $user){
			Manager::get()->remove($gallery);
			Manager::get()->flush();
		}

	}
}