<?php 
	function ketnoiCSDL()
	{
		$server="localhost";
		$username="root";
		$password="";
		$dbname="shopbandienthoai";
		
		$conn= mysqli_connect($server,$username,$password);
		if(!$conn){
			echo "Kết nối không thành công!!!";
		}
		else{	
			mysqli_set_charset($conn, 'UTF8');
			mysqli_select_db($conn,$dbname);
			return $conn;
		}
	
	}
	
	function chuyendoi($sotien){
		$x = number_format($sotien,0,',','.');
		return $x;
	}
 ?>