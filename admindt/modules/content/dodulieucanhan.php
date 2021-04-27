<?php
	$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
	mysqli_set_charset($conn, 'UTF8');
	$id = $_GET['id'];
	$sql = "SELECT * FROM nhanvien WHERE STT = '$id'";
	$resuft = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($resuft)) {
		$arr = [
			'idnvs' => $row['MaNV'],
			'tennvs' => $row['Ten'],
			'sdts' => $row['SDT'],
			'diachis' => $row['DiaChi'],
			'ngaysinhs' => $row['NgaySinh'],
			'gioitinhs' => $row['GioiTinh']
		]; 
		echo json_encode($arr);
		//echo '<input type="file" name="hinhanhs" id="files" onchange="return fileValidations()" value = "'.$row['hinhanh'].'">';
	}
?>