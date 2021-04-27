<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php  include_once ("connect.php");?>
</head>

<body>
<?php
class nhanvien_model{
	private $conn;
	var $luu="";
	public function __construct(){
		$this->conn = ketnoiCSDL();
	}
	function run_my_select_sql($sql){
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
	function get_all_nhanvien(){
		$sql="SELECT * FROM nhanvien";
		return $this->run_my_select_sql($sql);
	}
	function get_nhanvien_by_MaNV($MaNV){
		$sql="SELECT * FROM nhanvien  WHERE MaNV = '$MaNV'";
		return $this->run_my_select_sql($sql);
	}
	function get_nhanvien_by_STT($STT){
		$sql="select * from nhanvien where STT = '$STT'";
		return $this->run_my_select_sql($sql);
	}
	function update_nhanvien($tennvs,$sdts ,$diachis,$gioitinhs,$idnvs){
		$sql = "UPDATE nhanvien SET Ten = '$tennvs',SDT='$sdts',DiaChi = '$diachis',GioiTinh = '$gioitinhs' WHERE MaNV = '$idnvs'";
		return $this->run_my_select_sql($sql);
	}
	function update_pass_nhanvien($newpass,$id){
		$sql = "UPDATE nhanvien SET Pass = '$newpass'  WHERE MaNV = '$id'";
		return $this->run_my_select_sql($sql);
	}
	
}
?>
</body>
</html>