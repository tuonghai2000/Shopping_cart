<?php 
	session_start();
	$id = $_GET['masp'];
	$tongsl = 0;
	$thanhtiennew = 0;
	$tongtiennew = 0; 
	$soluongnew = 0;
	$_SESSION['cart'][$id]['soluong'] =  $_GET['soluong'];
	foreach ($_SESSION["cart"] as $key => $value) {
		$tongsl = $tongsl + $_SESSION['cart'][$key]['soluong'];
		$tongtiennew = $tongtiennew + ($_SESSION['cart'][$key]['soluong']*$_SESSION['cart'][$key]['gia']);
	}
	$soluongnew = $_SESSION['cart'][$id]['soluong'];
	$thanhtiennew = $soluongnew * $_SESSION['cart'][$id]['gia'];
	$arr = array(
		'soluong' => $tongsl,
		'soluongsp' => $soluongnew,
		'thanhtien' => $thanhtiennew,
		'tongtien' => $tongtiennew
	);
	echo json_encode($arr);
 ?>