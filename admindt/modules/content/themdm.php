<?php 

if(isset($_POST['clickthemdm']))
{
    $ten=$_POST['tendm'];
    $id=$_POST['id'];
    $maloai = strtoupper(substr($ten, 0,2));

   // echo'<script>alert("'.$maloai.'")</script>';
    

    $query = "INSERT INTO loaisanpham (idLSP,tenloai,maloai)
    VALUES ('$id','$ten','$maloai')";

                    // $boo = $conn->query($query);
    if (mysqli_query($conn,$query))

                    // echo'<script>alert("'.$boo.'")</script>';
        echo "<script>window.location='index.php?xem=danhmuc&id=1'</script>";
                    //echo $query;
    else echo "Error: " . $query . "<br>" . $conn->error;
}
?>
