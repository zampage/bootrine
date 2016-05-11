<?php

if(isset($_POST['action'])){

	require_once('config.php');

	if($_POST['action'] == 'addGallery'){

		$gname = htmlspecialchars($_POST['gname']);
		$uid = $_SESSION['user']['uid'];
		$user = Manager::get()->getRepository('User')->find($uid);

		$gallery = new Gallery();
		$gallery->setName($gname);
		$gallery->setPrivate(0);
		$gallery->setUser($user);

		Manager::get()->persist($gallery);
		Manager::get()->flush($gallery);

		$gallery->displayThumb();

	}

}