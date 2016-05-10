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
			<a class="navbar-brand" href="home">Booterine</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<!--<li><a href="#">Home</a></li>-->
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

<!-- CONTENT -->

<div class="outer-wrapper">
	
	<div class="page-header">
		<h1>Willkommen auf Bootrine</h1>
	</div>

	<div class="container-fluid">
		<div class="row display-gallerys">

			<!-- EXAMPLE -->
			<!--
			<div class="col-md-4 col-sm-6 col-xs-12">
				<a href="gallery/testgallery" class="thumbnail">
					<img src="..." height="300" width="300">
				</a>
				<a href="gallery/testgallery">
					<h3>testgallery&nbsp;<small>by markus</small></h3>
				</a>
			</div>
			-->

			<?php

				//really really dirty code!!
				//TBD

				$grepo = Manager::get()->getRepository('Gallery');
				$galleries = $grepo->findAll();

				if($galleries){

					foreach($galleries AS $g){

						echo '<div class="col-md-4 col-sm-6 col-xs-12">';

						echo '<a href="gallery/' . $g->getGid() . '" class="thumbnail">';
						$imgs = $g->getImages();
						if($imgs){
							echo '<img src="' . IMAGES_PATH . $imgs[0]->getPath() . '" height="300" width="300">';
						}
						echo '</a>';

						echo '<a href="gallery/' . $g->getGid() . '">';
						echo '<h3>' . $g->getName() . '&nbsp;<small>by ' . $g->getUser()->getUsername() . '</small></h3>';
						echo '</a>';

						echo '</div>';

					}

				}

			?>

		</div>
	</div>
</div>