<?php

if(isset($_GET["param"])) {
	//Check if gallery exists
	
} else {
	//404 Gallery not found
	header("Location: ".ROOT."404");
}

?>