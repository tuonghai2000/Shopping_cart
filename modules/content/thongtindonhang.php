<?php include_once ("C:/xampp/htdocs/Shopping_cart/core/donhang_model.php"); ?>
<?php 
    $idHD = $_GET['id'];
	$donhangmodel = new donhang_model();
	$run = $donhangmodel->get_donhang_by_idHD($idHD);
    while ($row = mysqli_fetch_array($run)) {
        $hd = $row['idHD'];
        $hoten = $row['hoten_user'];
        $ngay = $row['Ngaytao'];
        $thanhtoan =  $row['payment'];
        $diachi = $row['Diachi'];
        $tong = $row['Tongtien'];
    }

 ?>
<div class="col-xs-12 col-sm-8 col-md-10 col-md-offset-1">
        <div class="alert">
            <i class="fa fa-check"></i>
            <strong>Đơn hàng</strong>
            <span>của bạn đã được mua thành công</span>
        </div>
    <div id="boderform">
            <div class="labelform"><p style="text-align:center;">ĐƠN HÀNG</p></div>
            <div class="col-xs-12 col-sm-8 col-md-11" id="thdonhang">
                <h2>Mã đơn hàng của bạn : 
                    <b>#<?php echo $hd; ?></b>
                </h2>
                <p>
                    <b>Tên khách hàng :</b>
                    <span><?php echo $hoten; ?></span>
                </p>
                <p>
                    <b>Ngày đặt hàng :</b>
                    <i><?php echo $ngay; ?></i>
                </p>
                <p>
                    <b>Phương thức thanh toán :</b>
                    <span><?php echo $thanhtoan; ?></span>
                </p>
                <p>
                    <b>Địa chỉ :</b>
                    <span><?php echo $diachi; ?></span>
                </p>
                <h3>Thông tin đơn hàng</h3>
                <table class="table table-sm">
                  <thead class="tb">
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Sản phẩm</th>
                      <th scope="col">Đơn giá</th>
                      <th scope="col">Số lượng</th>
                      <th scope="col">Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $i = 1;
                        $donhangmodel= new donhang_model();
						$runs = $donhangmodel->get_donhang_by_idHD($idHD);
                        while ($rows = mysqli_fetch_array($runs)) {
                            echo '
                                <tr>
                                  <th scope="row">'.$i.'</th>
                                  <td>'.$rows['tensp'].'</td>
                                  <td>'.chuyendoi($rows['Dongia']).' VNĐ</td>
                                  <td>'.$rows['Soluong'].'</td>
                                  <td>'.chuyendoi($rows['Thanhtien']).' VNĐ</td>
                                </tr>
                            ';
                            $i++;
                        }
                     ?>
                    <tr class="tongtiendh">
                        <td colspan="4" class="text-right"><b>Tổng tiền thanh toán:</b> </td>
                        <td><p><?php echo number_format($tong,0,',','.'); ?> VNĐ</p></td>
                    </tr>
                  </tbody>
                </table>
                </div>
            <div class="clearfix"></div>
    </div>
    <div class="nut" style="margin-left:72%;">
        <button type="button" name="next"  class="btn btn-info " id="next" onclick="nextbuy()" >Tiếp tục mua hàng</button>
        <button type="button" class="btn btn-info" id="view" onclick="nextDh()">Đơn hàng của tôi</button>
    </div>
</div>
<script type="text/javascript">
    function nextbuy(){
        window.location = 'index.php';
    }
    function nextDh(){
        window.location = 'index.php?xem=taikhoancuatoi&id=dhcuatoi';
    }
</script>