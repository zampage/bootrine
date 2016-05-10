<?php

if(isset($_POST)){
	Reglog::register($_POST['username'], $_POST['password']);
	header('location:login/goodregistration');
}else{
	header('location:home');
}

exit();