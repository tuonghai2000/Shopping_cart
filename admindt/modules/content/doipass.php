<?php 
if(isset($_POST['clickdoipass']))
{
    $id = $_POST['idnvsp'];
    $pass=$_POST['pass'];
    $newpass=$_POST['newpass'];
    $repass=$_POST['repass'];

    if($pass == "")
    {
        echo '<script>alert("Nhập pass cũ")</script>';
    }
    else if($newpass == "")
    {
        echo '<script>alert("Nhập pass mới")</script>';
    }
    else if($repass == "")
    {
        echo '<script>alert("Chưa nhập lại pass mới")</script>';
    }
    else if ($newpass != $repass)
    {
        echo '<script>alert("Không trùng pass")</script>';
    }
    else 
    {
        $sqlcheck = "SELECT * FROM nhanvien  WHERE MaNV = '$id'";
        $resuft = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($resuft)) {
            $checkpass = $row['Pass'];
        }
            if ($checkpass == $pass)
            {
                $sql = "UPDATE nhanvien SET Pass = '$newpass'  WHERE MaNV = '$id'";
                if (mysqli_query($conn,$sql))
                {
                    echo '<script>alert("Đổi thành công")</script>';
                    echo "<script>window.location='login.php'</script>";
                }

                else echo "Error: " . $sql . "<br>" . $conn->error;
            }
            else echo '<script>alert("Mật khẩu cũ không hợp lệ")</script>';
        }


    }

    ?>