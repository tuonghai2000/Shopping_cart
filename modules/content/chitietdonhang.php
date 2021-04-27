<?php include_once ("C:/xampp/htdocs/Shopping_cart/core/donhang_model.php"); ?>
<?php
if(isset($_SESSION['user']))
{
	$hoten=$_SESSION['user']['hoten'];
	$idHD=$_GET['idHD'];
	  $donhangmodel = new donhang_model();
	  $run = $donhangmodel->get_chitietdonhang_by_idHD($idHD) ;
      $runs = $donhangmodel->get_chitietdonhang_by_idHD($idHD);
      $rows = mysqli_fetch_array($runs);
      $tongtiens = 0;
    }
?>

<div class="col-xs-12 col-sm-8 col-md-9">
	<?php echo'<h3>Đơn hàng của tôi</h3>
	<p>Đơn hàng của <b>'.$rows['hoten_user'].'</b> Mã hóa đơn( <b>#'.$idHD.'</b> )</p>
        <div class="col-xs-12 col-sm-8 col-md-6 p5">
            <h5>ĐỊA CHỈ GIAO HÀNG</h5>
            <div class="address-1">
                <p class="name">Tên :<b>'.$rows['hoten_user'].'</b></p>
                <p class="address-2">
                    <span>Địa chỉ : </span>
                    '.$rows['Diachi'].'
                </p>
                <p class="dt"><span>Điện thoại :</span>
                    '.$rows['phone'].'
                </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">
            <h5>HÌNH THỨC THANH TOÁN</h5>
            <div class="address-1">
                <p>Thanh toán <b>'.$rows['payment'].'</b> khi nhận hàng</p>
            </div>
        </div>
    <table class="table">
    	<tr class="tb">
        	<th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>';
		$i=1;
while($row= mysqli_fetch_array($run)){
        $tongtiens = $row['Tongtien'];
       echo'<tr class="rowcthd">
        	<th>'.$i.'</th>
            <th><img class="anhdonhang" src="admindt/update/'.$row['hinhanh'].'"></th>
            <th class="col-md-3">'.$row['tensp'].'</th>
            <th>'.chuyendoi($row['dongia']).' VNĐ</th>
            <th>'.$row['soluong'].'</th>
            <th>'.chuyendoi($row['thanhtien']).' VNĐ</th>
        </tr>';
		$i++;
    }
        echo '
            <th colspan="5" class="text-right" style="font-size:18px;">Tổng tiền :</th>
                <th style="color:#CA0000;font-size:18px;">'.chuyendoi($tongtiens).' VNĐ</th>
            </tr>
        ';
        echo'</table>';
?>
</div>
