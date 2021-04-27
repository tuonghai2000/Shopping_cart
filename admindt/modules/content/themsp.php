<!-- Thêm -->
<?php 

if(isset($_POST['clickthem']))
{
    $ten=$_POST['ten'];
    $gia=$_POST['gia'];
    $loai=$_POST['dropdown'];
    $mota=$_POST['mota'];

    $file_name=$_FILES['hinhanh']['name'];
    $file_path=$_FILES['hinhanh']['tmp_name'];
    $new_path="update/".$file_name;  
    $hinhanh=move_uploaded_file($file_path,$new_path);

    $query = "INSERT INTO sanpham (idSP,idLSP,tensp,gia,mota,hinhanh)
    VALUES (NULL,'$loai','$ten','$gia','$mota','$file_name')";

                    // $boo = $conn->query($query);
    if (mysqli_query($conn,$query))
        
                    // echo'<script>alert("'.$boo.'")</script>';
        echo "<script>window.location='index.php?xem=sanpham&id=1'</script>";
                    //echo $query;
    else echo "Error: " . $query . "<br>" . $conn->error;
}
?>

