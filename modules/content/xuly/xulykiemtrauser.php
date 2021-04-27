<?php 
	session_start();
	if(isset($_POST['thanhtoan'])){
		echo "<script>alert('Bạn phải đăng nhập trước khi mua hàng');</script>";
	}
	else{
		echo "string";
	}

 ?>