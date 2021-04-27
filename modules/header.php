<?php 
	if(isset($_GET['xem'])){
		$tam = $_GET['xem'];
		if($tam == 'dangxuat'){
			unset($_SESSION['user']);
			unset($_SESSION['cart']);
			//session_destroy();
			header('location: index.php');
		}
	}
 ?>
<header id="header">
		<div class="topbar">
			<div class="container-fluid">
				<div class="col-xs-12 col-sm-6 p0 col-md-3 hotline-top">
					<img src="images/phone-24.png" alt="hotline" />
					<p>Điện thoại: <a href="tel:01649.629.629">0968798351</a></p>
				</div>
				<div class="col-xs-12 col-sm-6 p0 col-md-9">
					<ul class="nav navbar-nav">                            
                            <?php 
                            	if(isset($_SESSION['user'])){
                            		echo '
										<li><a href="index.php?xem=taikhoancuatoi&id=hscuatoi"><i class="fa fa-pencil-square-o">
										Tài khoản</i></a></li>
	                            		<li><a href="index.php">Hello:'.$_SESSION['user']['username'].'</a></li>
	                            		<li><a href="index.php?xem=dangxuat"><i class="fa fa-sign-out"> ĐĂNG XUẤT</i></a></li>';
                            	}
                            	else{
                            		echo '
                            		<li><a href="index.php?xem=dangky&id=1"><i class="fa fa-user-plus"> ĐĂNG KÝ</i></a></li>
                            		<li><a href="index.php?xem=dangnhap&id=1"><i class="fa fa-sign-in"> ĐĂNG NHẬP</i></a></li>';
                            	}
                             ?>
                          </ul>

				</div>
			</div>
		</div>
		<div class="header">
			<div class="container">
				<div class="col-xs-12 col-md-4">
					<div id="logo">
						<a href="index.php"><img src="images/LOGO.png" alt=""></a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div id="search">
						<form action="" method="get">
							<input type="text" name="key" value="" placeholder="Nhập sản phẩm cần tìm" />
							<button type="submit" name="xem" value="search" >Tìm kiếm</button>
						</form>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="cart">
						<a href="index.php?xem=cart&id=1">
						<div class="discart">
							<span class="mycart">Giỏ hàng:</span>
							<?php 
							 	if(!empty($_SESSION["cart"])){
							              $tongtien = 0;
							              $tongsoluongsp = 0;
							              foreach ($_SESSION["cart"] as $key => $value) {
							                $tongsoluongsp += $_SESSION['cart'][$key]['soluong'];
							              }
							              echo '<span class="count_products_cart" id="slt">'.$tongsoluongsp.'</span>';
							          }
							          else {
							          	echo '<span class="count_products_cart">0</span>';
							          }
							 ?>
						</div>
						</a>
					</div>
				</div>
			</div>	
		</div>
		<!-- class="hidden-xs hidden-sm" data-spy="affix" data-offset-top="197" -->
		<nav id="mainmenu">
			<div class="container">
				<ul class="x1">
						<li id="menudrop">
						<a href="#"><i class="fa fa-bars fa-x2 fa-lg" aria-hidden="true"></i>DANH MỤC SẢN PHẨM</a>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
						<ul class="drop2" id="navbarcroll">
							<?php 
								$loaisanphammodel= new loaisanpham_model();
								$loaisanpham = $loaisanphammodel->get_all_loaisanpham();
								while ($row = mysqli_fetch_array($loaisanpham,MYSQLI_ASSOC)) {
									echo "<li><a href='index.php?xem=loaisanpham&id=$row[idLSP]'>$row[tenloai]</a></li>";
								}

							 ?>
						</ul>
					</li>
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="index.php?xem=gioithieu">Liên hệ</a></li>
					<li><a href="tel:01649.629.629">HOTLINE: 01649.629.629 (từ 8h-22h cả T7,CN)</a></li>
				</ul>
			</div>
		</nav>
	</header>
<!-- <script>
	window.onscroll = function() {scrollFunction()};
		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		    document.getElementById("navbarcroll").style.display = "none";
		  } else {
		    document.getElementById("navbarcroll").style.display = "block";
		  }
}
</script> -->