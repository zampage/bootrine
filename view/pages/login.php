<div class="outer-wrapper">
	<div class="page-header">
		<h1>Login</h1>
	</div>

	<!-- FAILED LOGIN -->

	<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-alert"></span>
		&nbsp;
		Falscher Benutzername oder Kennwort!
	</div>

	<!-- // -->

	<form id="login-form" action="" method="POST">
		<div class="input-group">
			<span class="input-group-addon glyphicon glyphicon-user"></span>
			<input type="text" class="form-control" placeholder="Benutzername">
		</div>
		<div class="input-group">
			<span class="input-group-addon glyphicon glyphicon-lock"></span>
			<input type="password" class="form-control" placeholder="Passwort">
		</div>
		<input type="submit" class="btn btn-default">
	</form>
</div>