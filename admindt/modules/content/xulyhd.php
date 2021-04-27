<?php
	
	$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
	mysqli_set_charset($conn, 'UTF8');
	$id = $_GET['id'];
	

	// $sqlds = "SELECT Trangthai FROM nhanvien WHERE STT = $id";
	// $run = mysqli_query($conn,$sqlds);
	// while ($row = mysqli_fetch_array($run))
	// 	$trangthainv = $row['Trangthai'];
	// if($trangthainv == "Mở khóa")
	// {
	$sql = "UPDATE donhang SET trangthai ='1' WHERE idHD = $id";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Xử lý thành công")</script>';
	    	echo "<script>window.location='index.php?xem=donhang&id=1'</script>";
		} else {
		    echo "Update thất bại: " . $conn->error;
		}
	
	// else
	// {
	// 	$sql = "UPDATE nhanvien SET Trangthai ='Mở khóa' WHERE STT = $id";

	// 	if ($conn->query($sql) === TRUE) {
	//     echo "<script>window.location='index.php?xem=taikhoan&id=1'</script>";
	// 	} else {
		    
	// 	}		
	// }

	//echo '<script>alert("'.$trangthainv.'")</script>';
?>