<div class="outer-wrapper">
	<div class="page-header">
		<h1>Registrieren</h1>
		<a href="<?php echo ROOT; ?>home">
			<span class="glyphicon glyphicon-home"></span>
			&nbsp;
			zurück zur Startseite
		</a>
	</div>

	<form id="register-form" action="<?php echo ROOT; ?>validateregistration" method="POST" data-toggle="validator">
		
		<div class="form-group has-feedback">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				<input type="text" class="form-control" name="username" placeholder="Benutzername" required pattern="^[a-zA-Z0-9.-]+$" data-native-error="Der Benutzername darf nur aus Gross-, Kleinbuchstaben, Zahlen und den Zeichen . und - bestehen!">
			</div>
			<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			<div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group has-feedback">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="password" id="pw" class="form-control" name="password" required pattern="^.{8,}$" placeholder="Passwort" data-native-error="Das Passwort muss mindestens 8 Zeichen lang sein!">
			</div>
			<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			<div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group has-feedback">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-repeat"></span></span>
				<input type="password" class="form-control" name="password" required data-match="#pw" placeholder="Passwort wiederholen" data-match-error="Die Passwörter stimmen nicht überein!">
			</div>
			<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			<div class="help-block with-errors"></div>
		</div>

		<input type="submit" class="btn btn-default" value="Registrieren">
	</form>
</div>