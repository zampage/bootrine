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
			<a class="navbar-brand" href="#">Booterine</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Home</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus"></span> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Gallerie name" aria-describedby="galleryName">
								<span class="input-group-addon" id="galleryName"><span class="glyphicon glyphicon-ok"></span>
							</div>
							
						</li>

					</ul>
				</li>

				<li><a href="#">Bearbeiten</a></li>

				<?php if(Reglog::check()){ ?>

					<!-- ONLY LOGGED IN USER -->
					<li><a href="logout">Ausloggen</a></li>

				<?php }else{ ?>

					<!-- ONLY NOT LOGGED IN USERS -->
					<li><a href="register">Registrieren</a></li>
					<li><a href="login">Einloggen</a></li>

				<?php } ?>

			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>