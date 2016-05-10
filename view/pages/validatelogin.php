<?php

if(isset($_POST['username']) && isset($_POST['password'])){
	if( Reglog::login($_POST['username'], $_POST['password']) ){
		header('location:home');
	}else{
		header('location:login/badlogin');
	}
}else{
	header('location:home');
}