<?php

if(isset($_POST['action'])){

	require_once('config.php');

	if($_POST['action'] == 'addGallery'){

		$gallery = Controller::addNewGallery($_POST['gname'], $_SESSION['user']['uid']);
		$gallery->displayThumb();

	}

}