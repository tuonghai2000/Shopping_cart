<!-- Thêm -->
<?php 
                if(isset($_POST['clicksua']))
                {
                    $idsp=$_POST['idsps'];
                    $tens=$_POST['tens'];
                    $gias=$_POST['gias'];
                    $loais=$_POST['dropdowns'];
                    $motas=$_POST['motas'];

                    if($_FILES['hinhanhs']['name'] != "")
                    {
                    $file_names=$_FILES['hinhanhs']['name'];
                    $file_path=$_FILES['hinhanhs']['tmp_name'];
                    $new_path="update/".$file_names;  
                    $hinhanh=move_uploaded_file($file_path,$new_path);

                    $sql = "UPDATE sanpham SET idLSP = '$loais',tensp = '$tens',gia='$gias',mota = '$motas',hinhanh = '$file_names' WHERE idSP = '$idsp'";
                    if (mysqli_query($conn,$sql))
                    echo "<script>window.location='index.php?xem=sanpham&id=1'</script>";
                    else echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    else
                    {
                             $file_names=$_FILES['hinhanhs']['name'];
                        $file_path=$_FILES['hinhanhs']['tmp_name'];
                        $new_path="update/".$file_names;  
                        $hinhanh=move_uploaded_file($file_path,$new_path);

                        $sql = "UPDATE sanpham SET idLSP = '$loais',tensp = '$tens',gia='$gias',mota = '$motas' WHERE idSP = '$idsp'";
                        if (mysqli_query($conn,$sql))
                        echo "<script>window.location='index.php?xem=sanpham&id=1'</script>";
                        else echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                   
                }
?>

