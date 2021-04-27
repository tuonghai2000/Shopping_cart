<?php
	$sanphammodel = new sanpham_model();
	$loaisanphammodel = new loaisanpham_model();
?>
<div id="home">
		<div class="container-fluid">
			<section id="featured">
				<?php 
					if(isset($_GET['xem'])){
						$tam = $_GET['xem'];
					}
					else {
						$tam = "";
					}
					if($tam == "" || $tam == "loaisanpham" || $tam == "search"){
							echo "";
					}
					else{
						echo '
								<nav aria-label="breadcrumb" id="crumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><a href="index.php">TRANG CHỦ</a></li>
								    <li class="breadcrumb-item active" aria-current="page">'.$tam.'</li>
								  </ol>
								</nav>
							';
					}
					switch ($tam) {
							
							case 'chamsockhachhang': echo "chăm sóc lhacs";break;
							case 'taikhoancuatoi': include("content/taikhoancuatoi.php");break;
							case 'dangnhap': include("content/dangnhap.php"); break;
							case 'dangky':include("content/dangky.php"); break;
							case 'chitietsanpham':include("content/chitietsp.php"); break;
							case 'cart':include("content/giohang.php");break;
							case 'addcart':include("content/xuly/addcart.php");break;
							case 'thanhtoan':include("content/thanhtoan.php");break;
							case 'xulythanhtoan':include("content/xuly/xulythanhtoan.php");break;
							case 'hoantat':include("content/thongtindonhang.php");break;
							case 'gioithieu':include("content/giothieu.php");break;
							default : include("content/danhmuc.php");break;

						}

				?>
			</section>
			<section id="main">
				<?php 
					if(isset($_GET['xem'])){
						$tam = $_GET['xem'];
					}
					else {
						$tam = "";
					}	
					if($tam == "" || $tam == "loaisanpham" || $tam == "search"){
						echo '<script>
							document.addeventlistener("load",fff());
							function fff() {}
						</script>';
					}		
						switch ($tam) {
							case 'loaisanpham':include("content/loaisanpham.php");break;
							case 'search':include("content/timkiem.php");break;
							case '':include("content/tatcasp.php");break;
						}
				?>
			</section>
		</div>
	</div>