<?php 
	include_once ("core/sanpham_model.php");
	include_once ("core/loaisanpham_model.php");
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Điện thoại chính hãng</title>
	<link rel="icon" type="image/ico" href="images/tieude.png" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="lib/awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/cssfont.css" rel="stylesheet">
	<link href="css/cssfamily.css" rel="stylesheet">
	<link href="css/stylemain.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/stylegiohang.css">
    <link rel="stylesheet" href="lib/slider/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="lib/slider/nivo-slider.css" type="text/css" media="screen" />
    <link rel='stylesheet' type="text/css" href='css/cssfontc.css'>
    <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.theme.css" rel="stylesheet">
    <link rel='stylesheet' href='css/sweet-alert.css'>

</head>
<body>
	<div class="container-fluid">
		<?php 
			include("modules/header.php");
			include("modules/body.php");
			include("modules/footer.php");

		?>
	</div>
</body>
</html>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src='js/sweet-alert.min.js'></script>
<script src="js/xulyjs.js"></script>
<script src="js/kiemtra.js"></script>
<script src="lib/slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
