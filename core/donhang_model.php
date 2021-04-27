<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php  include_once ("connect.php");?>
</head>

<body>
<?php
class donhang_model{
	private $conn;
	public function __construct(){
		$this->conn = ketnoiCSDL();
	}
	function run_my_select_sql($sql){
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
	function get_donhang_by_idHD($idHD){
		$sql="SELECT * FROM donhang dh,chitietdonhang ct,sanpham sp where ct.idSP=sp.idSP and ct.idHD=dh.idHD and dh.idHD = '$idHD'";
		return $this->run_my_select_sql($sql);
	}
	function donhangcuatoi($iduser){
		$sql="SELECT idHD,tongtien,trangthai,hoten_user FROM donhang dh where dh.idUser = '$iduser'";
		return $this->run_my_select_sql($sql);
	}
	function inser_donhang($iduser,$hoten,$gmail,$SDT,$diachi,$tongtien,$payment,$date){
		$sql = "INSERT INTO donhang(idHD,idUser,hoten_user,Gmail_user,phone,Diachi,Tongtien,payment,Ngaytao,trangthai)
        VALUES(NULL,'$iduser','$hoten','$gmail','$SDT','$diachi','$tongtien','$payment','$date','0');";
		return $this->run_my_select_sql($sql);
	}
	function inser_iddonhang(){
		return mysqli_insert_id($this->conn);
	}
	function get_chitietdonhang_by_idHD($idHD){
		$sql = "SELECT idCTHD,hinhanh,tensp,dongia,soluong,thanhtien,Tongtien,Diachi,phone,payment,Trangthai,hoten_user FROM donhang dh,chitietdonhang ct,sanpham sp where ct.idSP=sp.idSP and ct.idHD=dh.idHD and dh.idHD = '$idHD'"; 
		return $this->run_my_select_sql($sql);
	}
	function insert_chitietdonhang(){
		$sql = "INSERT INTO chitietdonhang (idCTHD,idHD, idSP, Soluong, Dongia, Thanhtien,khuyenmai) VALUES (NULL, '$last_id', '$key', '".$_SESSION['cart'][$key]['soluong']."', '".$_SESSION['cart'][$key]['gia']."', '$thanhtien', '');";
		return $this->run_my_select_sql($sql);
	}
	
}
?>
</body>
</html>