<?php include_once ("C:/xampp/htdocs/Shopping_cart/core/sanpham_model.php"); ?>
<?php 
	session_start();
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sanphammodel= new sanpham_model();
		$run = $sanphammodel->get_sanpham_by_idSP($id);
		$row=mysqli_fetch_array($run);
		if(!empty($_SESSION["cart"])){ //lần thứ 2 mua hàng
			$cart = $_SESSION["cart"];
			if(array_key_exists($id,$cart)){
				$cart[$id] = 	array(
				"soluong" => (int)$cart[$id]['soluong']+1,
				"tensp" => $row['tensp'],
				"gia" => $row['gia'],
				"hinhanh" => $row['hinhanh']
			);
			}
			else{
				$cart[$id] = 	array(
				"soluong" => 1,
				"tensp" => $row['tensp'],
				"gia" => $row['gia'],
				"hinhanh" => $row['hinhanh']
			);
			}
		}
		else {
			//lần đầu tiền mua hàng
			$cart[$id] = 	array(
				"soluong" => 1,
				"tensp" => $row['tensp'],
				"gia" => $row['gia'],
				"hinhanh" => $row['hinhanh']
			);
		}
		$_SESSION["cart"] = $cart;
	}
 ?>
 <div class="discart">
	<span class="mycart">Giỏ hàng:</span>
		<?php 
			if(!empty($_SESSION["cart"])){
				$tongtien = 0;
				$tongsoluongsp = 0;
				foreach ($_SESSION["cart"] as $key => $value) {
					$tongsoluongsp += $_SESSION['cart'][$key]['soluong'];
				}
				echo '<span class="count_products_cart">'.$tongsoluongsp.'</span>';
				}
				else {
					echo '<span class="count_products_cart">0</span>';
							          }
		?>
</div>