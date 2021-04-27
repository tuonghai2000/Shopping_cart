<?php
	$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
	mysqli_set_charset($conn, 'UTF8');
	$sql = "SELECT COUNT(*) FROM nhanvien ";
	$resuft = mysqli_query($conn,$sql);
	
	while ($row = mysqli_fetch_array($resuft)) {
		$sotieptheo = $row['COUNT(*)'];
		}
		$manvtieptheo = "Manager0".$sotieptheo;	
		$arr = [
				'idnvsp' => $manvtieptheo
			]; 
		//echo '<script>alert("abc")</script>';
		echo json_encode($arr);
		
?>