<?php include_once ("C:/xampp/htdocs/Shopping_cart/core/sanpham_model.php"); ?>
<?php 
  if(isset($_GET['id']) && isset($_GET['sl'])){
    $id = $_GET['id'];
    $sanphammodel= new sanpham_model();
	$run = $sanphammodel->get_sanpham_by_idSP($id);
    $row=mysqli_fetch_array($run,MYSQLI_ASSOC);
    if($_GET['sl']>0){
      $_SESSION["cart"][$_GET["id"]] = array(
        'soluong'=>$_GET['sl'],
        "tensp" => $row['tensp'],
        "gia" => $row['gia'],
        "hinhanh" => $row['hinhanh']
      ); 
    }
    else{
      unset($_SESSION["cart"][$_GET["id"]]);
    }
  }
  if(isset($_GET['id']) && isset($_GET['action'])){
    unset($_SESSION["cart"][$_GET["id"]]);
  }
 ?>

<div class="col-xs-12 col-sm-8 col-md-12 ">
    <div class="name_cart">
        <h4 class="title"><span>GIỎ HÀNG CỦA TÔI</span></h4>
      </div>
    <div class="col-xs-12 col-sm-8 col-md-8">
        <?php 
            if(!empty($_SESSION["cart"])){
              $tongtien = 0;
              $i = 0;
              foreach ($_SESSION["cart"] as $key => $value) {
                $i++;
                $thanhtien = $_SESSION['cart'][$key]['soluong'] * $_SESSION['cart'][$key]['gia'];
                    echo '
                    <div class="cart_item">
                      <div class="cart_left">
                        <div class="cart_img"><img src="admindt/update/'.$_SESSION['cart'][$key]['hinhanh'].'"></div>
                        <div class="cart_content">
                          <a href="index.php?xem=chitietsanpham&id='.$key.'">'.$_SESSION['cart'][$key]['tensp'].'</a>
                        </div>
                      </div>
                      <div class="cart_mid">
                          <p class="price_item" id="'.$key.'">'.number_format($thanhtien,0,',','.').' VNĐ</p>
                          <p class="price_sale" style="text-decoration: line-through;">25.000.000đ</p>
                          <p class="price_sale">-49%</p>
                          <div>
                            <span class="fa fa-heart-o" style="font-size:23px;"></span>  
                            <a href="javascript:void(0)" onclick="removeItem('.$key.')" id="'.$key.'">
                              <span class="fa fa-trash" style="font-size:27px; margin-left: 10px;"></span>
                            </a>
                          </div>
                      </div>
                      <div class="cart_right text-center">
                        <i class="fa fa-minus minus" aria-hidden="true" id="sub" onclick="tru('.$key.')"></i>
                        <input type="text" id="sl'.$key.'" value="'.$_SESSION['cart'][$key]['soluong'].'" name="quantity" class="soluongcart" onkeyup="kiemtraslcart('.$key.')">
                        <i class="fa fa-plus plus" id="add" aria-hidden="true" onclick="cong('.$key.')"></i>
                      </div>
                        <div class="cart_right text-center">
                          
                        </div>
                    </div>
                ';
              }
            }
            else{
              echo "Giỏ hàng trống";
            }
         ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 ">
    <div class="thanhtoan" style="height: 300px;">
        <h4>THÔNG TIN ĐƠN HÀNG <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
        <?php 
            $key = 0;
           if(!empty($_SESSION["cart"])){
              $tongtien = 0;
              $tongsoluongsp = 0;
              foreach ($_SESSION["cart"] as $key => $value) {
                $tongtien +=  ($_SESSION['cart'][$key]['soluong'] * $_SESSION['cart'][$key]['gia']);
                $tongsoluongsp += $_SESSION['cart'][$key]['soluong'];
              }
              echo '
                <div class="thongtin">
                  <label >Tạm tính (<i id="sltt">'.$tongsoluongsp.'</i> sản phẩm)</label>
                </div>
                <div class="giatien">
                  <p class="price_item" id="sum">'.number_format($tongtien,0,',','.').' VNĐ</p>
                </div>
                <div class="thongtin">
                  <label>Phí vận chuyển</label>
                </div>
                <div class="giatien">
                  <p class="price_item">Miễn phí</p>
                </div>
                <hr>
                <div class="thongtin">
                  <label>Tổng cộng</label>
                </div>
                <div class="giatien">
                  <p class="price_item" id="sumt">'.number_format($tongtien,0,',','.').' VNĐ</p>
                </div>
                  ';
            }
            else {
              echo '
              <div class="thongtin">
                <label>Tạm tính (0 sản phẩm)</label>
              </div>
              <div class="giatien">
                <p class="price_item">0 VNĐ</p>
              </div>
              <div class="thongtin">
                <label>Phí vận chuyển</label>
              </div>
              <div class="giatien">
                <p class="price_item">Miễn phí</p>
              </div>
              
              <hr>
              <div class="thongtin">
                <label>Tổng cộng</label>
              </div>
              <div class="giatien">
                <p class="price_item">0 VNĐ</p>
              </div>
                ';
            }
          
         ?>
        <div class="text-center">
            
        <?php 
            if(!isset($_SESSION['user'])){
                  echo '
                  <form action="" method="post">
                    <button type="button"  class="xacnhantt" data-toggle="modal" data-target="#myModal" id="xn">XÁC NHẬN GIỎ HÀNG</button>
                  </form>
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content"> 
                        <div class="modal-body">
                          <p>Bạn cần phải đăng nhập để mua hàng</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" name="ghDN" id="ghDN" onclick="ghdangnhap()">Đăng nhập</button>
                          <button type="button" style="margin-right:200px;" id="ghThoat" class="btn btn-default mr-5" data-dismiss="modal">Thoát</button>
                        </div>
                      </div>
                    </div>
                  </div>';
            }
           elseif(!isset($_SESSION['cart'][$key])){
              echo '
                <form action="" method="post">
                <button type="button" class="xacnhantt" data-toggle="modal" 
                data-target="#myModal" id="xn">XÁC NHẬN GIỎ HÀNG</button>
                </form>
                <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content"> 
                <div class="modal-body">
                <p>Giỏ hàng của bạn trống</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" id="ghDN" name="ghT" onclick="ghthemhang()">Thêm hàng</button>
                <button type="button" style="margin-right:200px;" id="ghThoat" class="btn btn-default mr-5" data-dismiss="modal">Thoát</button>
                </div>
                </div>
                </div>
                </div>';
            }
            else{
                echo '<form action="" method="post">
                        <button type="button" name="thanhtoan" class="xacnhantt"  id="xn" onclick="ghthanhtoan()">XÁC NHẬN GIỎ HÀNG</button>
                      </form>';
            }
           ?>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function ghdangnhap(){
        window.location='index.php?xem=dangnhap&id=1';
    }
    function ghthemhang(){
        window.location='index.php';
    }
    function ghthanhtoan(){
        
        window.location='index.php?xem=thanhtoan&id=1';
        //$('form#ID_form').serialize();
    }
</script>