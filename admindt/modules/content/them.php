<!-- Thêm -->
<?php 

if(isset($_POST['clickthemnhanvien']))
{
    $ten=$_POST['idnvs'];
    $gia=$_POST['tennv'];
    $loai=$_POST['sdt'];
    $diachi=$_POST['diachis'];
    $ngaysinh=$_POST['ngaysinh'];
    $gioitinh=$_POST['gioitinh'];
    $luong=$_POST['luong'];


    $query = "INSERT INTO nhanvien (STT,MaNV,Ten,SDT,DiaChi,NgaySinh,GioiTinh,Luong,Pass,Trangthai,PhanQuyen)
    VALUES (NULL,'$ten','$gia','$loai','$diachi','$ngaysinh','$gioitinh','$luong','$loai','Mở khóa','Manager')";

                    // $boo = $conn->query($query);
    if (mysqli_query($conn,$query))
        
                    // echo'<script>alert("'.$boo.'")</script>';
        echo "<script>window.location='index.php?xem=taikhoan&id=1'</script>";
                    //echo $query;
    else echo "Error: " . $query . "<br>" . $conn->error;
}
?>

