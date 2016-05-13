<?php

if(isset($_GET["param"])) {
	
	//Get correct Gallery
	Controller::displayGallery($_GET["param"]);
	
} else {
	//404 Gallery not found
	header("Location: ".ROOT."404");
	exit();
}

?>