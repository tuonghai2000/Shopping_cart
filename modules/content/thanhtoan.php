<?php 
  if(isset($_SESSION['user'])){
      $iduser = $_SESSION['user']['iduser'];
      $hoten = $_SESSION['user']['hoten'];
      $gmail = $_SESSION['user']['gmail'];
      $SDT = $_SESSION['user']['phone'];
      $diachi = $_SESSION['user']['diachi'];
    }
    if(!empty($_SESSION['cart'])){
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
          $tongtien += ($_SESSION['cart'][$key]['soluong'] * $_SESSION['cart'][$key]['gia']); 
        }
    }
    else{
        echo "<script>alert('Giỏ hàng của bạn trống');</script>";
        echo "<script>window.location='index.php?xem=cart&id=1'</script>";
    }
 ?>
<div class="col-xs-12 col-sm-8 col-md-12 ">
  <form action="modules/content/xuly/xulythanhtoan.php" method="POST" class="form-horizontal" style="margin: 0px;" name="formthanhtoan" id="formthanhtoan">
  <div class="name_cart">
        <h4 class="title"><span>THANH TOÁN</span></h4>
      </div>
      <div class="stepwizard">
</div>
    <div class="col-xs-12 col-sm-8 col-md-4 p5">
      <div class="thanhtoan">
        <div class="title-tt"><h4>1. ĐỊA CHỈ THANH TOÁN VÀ GIAO HÀNG</h4></div>
         <div class="title_tt">
              <p>Thông tin thanh toán</p>
          </div>
          <div class="title_link">
              <?php 
                  if(isset($_SESSION['user'])){
                    echo '<a href="index.php?xem=cart&id=1">Quay về giỏ hàng</a>';
                  }
                  else{
                    echo '<a href="index.php?xem=dangky&id=1">Đăng ký tài khoản mua hàng</a>
                          <b style="border-left: 1px solid #000;"></b>
                          <a href="index.php?xem=dangnhap&id=1">Đăng nhập</a>';
                  }
               ?>
              
          </div>
          <div class="title_tt">
              <p>Mua hàng không cần thanh toán</p>
          </div>
             <div class="form-group">
              <div class="col-md-10 col-md-offset-1">
                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Họ và tên" value="<?php echo $hoten;?>">
                <p  id="loifullname" style="color:red"></p>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-10 col-md-offset-1">
                <input type="text" name="gmail" class="form-control" id="gmail" placeholder="Gmail"
                  value="<?php echo $gmail;?>">
                  <p  id="loigmail" style="color:red"></p>
              </div>
            </div>
              <div class="form-group">
              <div class="col-md-10 col-md-offset-1">
                <input type="text" name="SDT" class="form-control" id="phone" placeholder="Số điện thoại"
                value="<?php echo $SDT;?>">
                <p  id="loiphone" style="color:red"></p>
               </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                  <input type="text" name="Diachi" class="form-control" id="diachi" placeholder="Địa chỉ" value="<?php echo $diachi;?>">
                  <p id="loidiachi" style="color:red"></p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-1">
                  <textarea rows="4" cols="47" placeholder="Ghi chú đơn hàng"></textarea>
                </div>
            </div>
          </div>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-4 p5">
      <div class="thanhtoan">
        <div class="title-tt"><h4>2. PHƯƠNG THỨC THANH TOÁN</h4></div>
            <div class="title_tt">
              <p>Chọn hình thức thanh toán</p>
            </div>
              <div class="htthanhtoan">
              <input type="radio" name="ptthanhtoan" value="Tiền mặt" class="ptthanhtoan">
                  <img src="images/tienmat.png" >
                  <label>Thanh toán khi nhận hàng</label>
              </div>
              <div class="htthanhtoan">
                <input type="radio" name="ptthanhtoan" value="Qua thẻ" class="ptthanhtoan">
                <img src="images/quathe.png">
                <label>Thanh toán qua thẻ</label>
              </div>    
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 p5">
    <div class="thanhtoan">
        <div class="title-tt"><h4>3. THÔNG TIN THANH TOÁN</h4></div>
            <div class="title_tt">
              <p>Thanh toán vận chuyển</p>
            </div>
              <div class="giatien">
                  <p class="price_item" name="tongtien"><?php echo number_format($tongtien,0,',','.'); ?> VNĐ</p>
              </div>
              <div class="thongtin">
                <label>Thành tiền</label>
              </div>
              <div class="giatien">
                <p class="price_item">Miễn phí</p>
              </div>
              <div class="thongtin">
                <label>Phí vận chuyển</label>
              </div>
              <div class="giatien">
                <p class="price_item"><?php echo number_format($tongtien,0,',','.'); ?> VNĐ</p>
              </div>
              <div class="thongtin">
                <label>Tổng cộng</label>
              </div>
        <div class="text-center">
              <input type="text" id="return" name="tongtien" value="<?php echo $tongtien; ?>" style="display:none;">
              <button type="button" name="thanhtoan" value="thanhtoan" class="xacnhantt" id="payment">THANH TOÁN</button>
        </div>
    </div>
  </div>
  </form>
</div>