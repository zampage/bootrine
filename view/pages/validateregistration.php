<?php

if(isset($_POST)){
	Reglog::register($_POST['username'], $_POST['password']);
	header('location:'.ROOT.'login/goodregistration');
}else{
	header('location:'.ROOT.'home');
}

exit();