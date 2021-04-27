<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php  include_once ("connect.php");?>
</head>

<body>
<?php
class loaisanpham_model{
	private $conn;
	public function __construct(){
		$this->conn = ketnoiCSDL();
	}
	function run_my_select_sql($sql){
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
	function get_all_loaisanpham(){
		$sql="SELECT * FROM loaisanpham";
		return $this->run_my_select_sql($sql);
	}
	function get_loaisanpham_by_ibLSP($idLSP){
		$sql="select * from loaisanpham where idLSP ='".$idLSP."'";
		return $this->run_my_select_sql($sql);
	}
	
}
?>
</body>
</html>