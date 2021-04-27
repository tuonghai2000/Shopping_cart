
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="font/css/all.css">
    <link rel="stylesheet" href="css/qlsp.css">
    <link rel="stylesheet" href="css/qldm.css">
    <link rel="stylesheet" href="css/qluser.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>
	<div class="wrapper">
		<?php 
            session_start();
            if(isset($_SESSION['dangnhap']) && $_SESSION['dangnhap'] == 1)
            include("modules/manager.php");
            else if (isset($_SESSION['dangnhap']) && $_SESSION['dangnhap'] == 2)
            include("modules/admin.php");
            else echo "<script>window.location='login.php'</script>";
		?>
	</div>
    <script src="jss/jquery-3.3.1.min.js"></script>
	<script src="jss/popup.js"></script>

    <script src="dangnhap/js/main.js"></script>
</body>
</html>