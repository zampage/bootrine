<div class="outer-wrapper">
	<div class="page-header">
		<h1>Login</h1>
		<a href="home">
		<span class="glyphicon glyphicon-home"></span>
		&nbsp;
		zurück zur Startseite
	</a>
	</div>

	<!-- FAILED LOGIN -->

	<?php if(isset($_GET['param']) && $_GET['param'] == "badlogin"){ ?>

	<div class="alert alert-danger kill-me-later" data-timer="2000" role="alert">
		<span class="glyphicon glyphicon-alert"></span>
		&nbsp;
		Falscher Benutzername oder Kennwort!
	</div>

	<?php } ?>

	<!-- // -->

	<form id="login-form" action="<?php echo ROOT; ?>validatelogin" method="POST">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" class="form-control" name="username" placeholder="Benutzername">
		</div>
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" class="form-control" name="password" placeholder="Passwort">
		</div>
		<input type="submit" class="btn btn-default" value="Login">
	</form>
</div>