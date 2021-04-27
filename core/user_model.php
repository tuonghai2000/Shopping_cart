<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php  include_once ("connect.php");?>
</head>

<body>
<?php
class user_model{
	private $conn;
	public function __construct(){
		$this->conn = ketnoiCSDL();
	}
	function run_my_select_sql($sql){
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
	function get_all_user(){
		$sql="SELECT * FROM user";
		return $this->run_my_select_sql($sql);
	}
	function get_user_by_idUser($idUser){
		$sql="SELECT * FROM user where idUser = '$idUser'";
		return $this->run_my_select_sql($sql);
	}
	function get_user_by_username($username){
		$sql="SELECT * FROM user where tendangnhap = '$username'";
		return $this->run_my_select_sql($sql);
	}
	function inser_user($username,$password,$hoten,$gmail,$Dienthoai,$Diachi){
		$sql = "INSERT INTO user(idUser,tendangnhap,matkhau,hoten,Gmail,SDT,Diachi) 
              VALUES 
              (Null,'$username','$password','$hoten','$gmail','$Dienthoai','$Diachi');";
			  echo $sql;
		return $this->run_my_select_sql($sql);
	}
	function update_user($id,$username,$password,$hoten,$gmail,$Dienthoai,$Diachi){
		$sql="UPDATE user SET tendangnhap='$username',matkhau = '$password', hoten = '$hoten',Gmail ='$gmail', SDT='$Dienthoai', Diachi= '$Diachi' where idUser = '$id'";
		echo $sql;
		return $this->run_my_select_sql($sql);
	}
	
}
?>
</body>
</html>