
<?php 
                if(isset($_POST['clicksuadm']))
                {
                    $id=$_POST['ids'];
                    $tens=$_POST['tendms'];
                    $maloai = strtoupper(substr($tens, 0,2));

                    $sql = "UPDATE loaisanpham SET tenloai = '$tens',maloai='$maloai' WHERE idLSP = '$id'";
                    if (mysqli_query($conn,$sql))
                    echo "<script>window.location='index.php?xem=danhmuc&id=1'</script>";
                    else echo "Error: " . $sql . "<br>" . $conn->error;
                }
?>