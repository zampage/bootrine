<?php
	require_once('config.php');
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		
		<meta charset="utf-8">
		<title><?php echo PAGE_NAME; ?></title>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">

		<!-- JS -->
		<script type="text/javascript" src="jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src=""></script>

	</head>
	<body>

		<?php
			include( Paging::getInstance()->find($_GET) );
		?>

	</body>
</html>