<!-- Thêm -->
<?php 
                if(isset($_POST['clicksuanhanvien']))
                {
                    $idnvs=$_POST['idnvs'];
                    $tennvs=$_POST['tennvs'];
                    $sdts=$_POST['sdts'];
                    $diachis=$_POST['diachis'];
                    $ngaysinhs=$_POST['ngaysinhs'];
                    $gioitinhs=$_POST['gioitinhs'];


                    $sql = "UPDATE nhanvien SET Ten = '$tennvs',SDT='$sdts',DiaChi = '$diachis',GioiTinh = '$gioitinhs' WHERE MaNV = '$idnvs'";
                    if (mysqli_query($conn,$sql))
                    echo "<script>window.location='index.php?xem=canhan&id=1'</script>";
                    else echo "Error: " . $sql . "<br>" . $conn->error;
                }
                   
?>

