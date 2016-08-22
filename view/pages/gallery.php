<?php if(isset($_GET["param"]) && Paging::getInstance()->checkGalleryAccess($_GET['param'])) { ?>

	<div class="outer-wrapper-gallery">
		<?php Controller::displayGalleryInfo($_GET["param"]); ?>
		<?php if(Controller::isOwnGallery($_GET['param'])){ ?>
		<div class="container-fluid gallery-editing-zone">
			<form class="gallery-editing-form">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
					<input type="text" class="form-control gallery-name" placeholder="Gallerie Name" value="<?php echo Controller::getCurrentGallery($_GET['param'])->getName(); ?>">
				</div>
				&nbsp;
				<input type="checkbox" class="gallery-private" <?php echo (Controller::getCurrentGallery($_GET['param'])->isPrivate()) ? "checked" : "" ; ?>>
				<input type="hidden" class="gallery-gid" value="<?php echo Controller::getCurrentGallery($_GET['param'])->getGid(); ?>">
				<input type="button" class="btn btn-primary save-gallery-edit" value="Speichern">
				<input type="button" class="btn btn-danger delete-gallery" value="Löschen">
				<hr>
			</form>
		</div>
		<?php } ?>
		<?php Controller::displayGalleryImages($_GET["param"]); ?>
	</div>

<?php		
	}else if(isset($_GET["param"]) && !Reglog::check()){
		header('location:'.ROOT.'login');
	}else{
		header('location:'.ROOT.'404');
	}
?>
