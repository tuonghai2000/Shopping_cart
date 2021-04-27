<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php  include_once ("connect.php");?>
</head>

<body>
<?php
class sanpham_model{
	private $conn;
	var $luu="";
	public function __construct(){
		$this->conn = ketnoiCSDL();
	}
	function run_my_select_sql($sql){
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
	function get_all_sanpham(){
		$sql="SELECT * FROM sanpham order by idSP desc";
		return $this->run_my_select_sql($sql);
	}
	function get_sanpham_by_idSP($idSP){
		$sql="select * from sanpham where idSP ='$idSP'";
		return $this->run_my_select_sql($sql);
	}
	function get_sanpham_by_idLSP($idLSP){
		$sql="select * from sanpham where idLSP ='".$idLSP."'";
		return $this->run_my_select_sql($sql);
	}
	function get_sanpham_by_idLSP_phantrang($idLSP,$start,$limit){
		$sql="select * from sanpham where idLSP ='".$idLSP."' Limit $start , $limit ";
		return $this->run_my_select_sql($sql);
	}
	function search($keyword,$idL,$giamin,$giamax){
		$sql = "SELECT * FROM sanpham where idSP !=0";
		if($keyword != " "){
			$sql .= " AND tensp LIKE '%$keyword%'";
		}
		if($idL != 0){
			$sql .="AND idLSP = '$idL'";
		}
		if($giamin != 0 || $giamax != 0){
			$sql .="AND gia between '$giamin' AND '$giamax'";
		}
		global $luu;
		$luu = $sql;
		
		return $this->run_my_select_sql($sql);
	}
	function search_phantrang($start,$limit){
		global $luu;
		$luu .= "Limit $start , $limit";
		return $this->run_my_select_sql($luu);
	}
}
?>
</body>
</html>