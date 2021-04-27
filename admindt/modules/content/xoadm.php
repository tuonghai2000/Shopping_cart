<?php

$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
	mysqli_set_charset($conn, 'UTF8');

$id = $_GET['id'];

$sql = " DELETE FROM loaisanpham WHERE idLSP= $id ";

if (mysqli_query($conn, $sql)) {
	echo '<script>alert("Xóa thành công")</script>';
} else {
	echo "Xóa thất bại: " . mysqli_error($conn);
}
	#echo'<script>alert("'.$sql.'")</script>';
echo "<script>window.location='index.php?xem=danhmuc&id=1'</script>";
?>