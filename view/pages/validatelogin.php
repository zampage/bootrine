<?php

if(isset($_POST['username']) && isset($_POST['password'])){
	if( Reglog::login($_POST['username'], $_POST['password']) ){
		header('location:'.ROOT.'home');
	}else{
		header('location:'.ROOT.'login/badlogin');
	}
}else{
	header('location:'.ROOT.'home');
}

exit();