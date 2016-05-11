<?php
	require_once('config.php');
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		
		<meta charset="utf-8">
		<meta name="author" content="<?php echo PAGE_AUTHOR ?>">
		<meta name="description" content="<?php echo PAGE_DESCRIPTION ?>">
		<meta name="keywords" content="<?php echo PAGE_TAGS ?>">
		<title><?php echo PAGE_NAME; ?></title>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>view/css/style-default.css">

		<!-- JS -->
		<script type="text/javascript" src="<?php echo ROOT; ?>jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="<?php echo ROOT; ?>bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo ROOT; ?>bootstrap/js/plugin.validator.js"></script>
		<script type="text/javascript" src="<?php echo ROOT; ?>view/js/core-default.js"></script>

	</head>
	<body>


		<!-- NAV -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo ROOT; ?>home">bootrine</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">

						<?php if(Reglog::check()){ ?>

							<!-- ONLY LOGGED IN USER -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus"></span> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li class="dropdown-add-gallery">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Gallerie name" aria-describedby="galleryName">
											<span class="input-group-addon" id="galleryName"><span class="glyphicon glyphicon-pencil"></span>
										</div>
										
									</li>

								</ul>
							</li>
							<li><a href="#">Bearbeiten</a></li>
							<li><a href="<?php echo ROOT; ?>logout">Ausloggen</a></li>

						<?php }else{ ?>

							<!-- ONLY NOT LOGGED IN USERS -->
							<li><a href="<?php echo ROOT; ?>register">Registrieren</a></li>
							<li><a href="<?php echo ROOT; ?>login">Einloggen</a></li>

						<?php } ?>

					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<!-- // -->


		<!-- CONTENT -->
		<?php Controller::handleContent(); ?>
		<!-- // -->

	</body>
</html>