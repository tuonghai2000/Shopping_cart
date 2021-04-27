
<?php 
  $conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("Kết nối thất bại");
	mysqli_set_charset($conn, 'UTF8');
  session_start();
    if(isset($_POST['ptthanhtoan'])){
      $payment = $_POST['ptthanhtoan'];
      $thanhtien = 0 ;
      $date = date('d-m-Y');
      $hoten = $_POST['fullname'];
      $gmail = $_POST['gmail'];
      $SDT = $_POST['SDT'];
      $diachi = $_POST['Diachi'];
      $tongtien = $_POST['tongtien'];
      $iduser = isset($_SESSION['user']) ? $_SESSION['user']['iduser']:0;
      $sql = "INSERT INTO donhang(idHD,idUser,hoten_user,Gmail_user,phone,Diachi,Tongtien,payment,Ngaytao,trangthai)
        VALUES(NULL,'$iduser','$hoten','$gmail','$SDT','$diachi','$tongtien','$payment','$date','0');";
      mysqli_query($conn, $sql);
      $last_id = mysqli_insert_id($conn);
      foreach ($_SESSION["cart"] as $key => $value) {
          $thanhtien = ($_SESSION['cart'][$key]['soluong']) * ($_SESSION['cart'][$key]['gia']);
          $sql = "INSERT INTO chitietdonhang (idCTHD,idHD, idSP, Soluong, Dongia, Thanhtien,khuyenmai) VALUES (NULL, '$last_id', '$key', '".$_SESSION['cart'][$key]['soluong']."', '".$_SESSION['cart'][$key]['gia']."', '$thanhtien', '');";
          mysqli_query($conn,$sql);
          unset($_SESSION['cart'][$key]);
          //echo "Bạn đã thanh toán thành công";
          echo '<script>window.location="index.php?xem=hoantat&id='.$last_id.'"</script>";';
       }
    //}
    }
    else {
      echo "<script>alert('Bạn phải chọn hình thức thanh toán');</script>";
    }
?>