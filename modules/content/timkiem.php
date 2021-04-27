<?php include_once ("C:/xampp/htdocs/Shopping_cart/core/sanpham_model.php"); ?>
<?php include_once ("C:/xampp/htdocs/Shopping_cart/core/loaisanpham_model.php"); ?>
<?php 
		$keyword ="";
		$giamin = "";
		$giamax = "";
		$idG = 0;
		$idL =0;
		if($_GET['key'] != " ")
			$keyword = $_GET['key']; 
			
		if(isset($_GET['idmin']) || isset($_GET['idmax']) || isset($_GET['idL'])){
			$giamin = $_GET['idmin'];
			$giamax = $_GET['idmax'];
			$idL = $_GET['idL'];
		}
		$sanphammodel= new sanpham_model();
		$run = $sanphammodel->search($keyword,$idL,$giamin,$giamax);
		
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$count = mysqli_num_rows($run);//đếm số dòng
		$limit = 8;
		$total_page = ceil($count/$limit);
		
		if($current_page > $total_page){
			$current_page = $total_page;
		}
		else if ($current_page < 1) {
			$current_page = 1;
		}
		$start = ($current_page -1)*$limit;
		
		
		$run = $sanphammodel->search_phantrang($start,$limit);
 ?>
<div id="maincontent" class="col-xs-12 col-sm-8 col-md-12" >
				<div  class="text-left">
                    <form action="index.php" method="get">
                    	<label>TÌM KIẾM NÂNG CAO:</label>
                        <input type="text" class="timnc" name="key" value="<?php echo $keyword; ?>" placeholder="Nhập sản phẩm" id="tennc">
                        <span>GIÁ: </span>
                        <input type="text" name="giatu" placeholder="Giá từ" class="timnc" id="giatu" value="<?php echo $giamin ?>" onkeyup="kiemtraso()">
                        <input type="text" name="giaden" placeholder="Giá đến" class="timnc" id="giaden" value="<?php echo $giamax ?>" onkeyup="kiemtrasoden()">
                        <span>LOẠI: </span><select name="idL" class="timnc" id="loai">
                                <option value="0">TẤT CẢ</option>
                                <?php 
									$loaisanphammodel= new loaisanpham_model();
                                	$run_loai = $loaisanphammodel->get_all_loaisanpham();
                                	while ($row = mysqli_fetch_array($run_loai)) {
                                		echo '<option value="'.$row['idLSP'].'">'.$row['tenloai'].'</option>';
                                	}
                                 ?>
                                
                        </select>
                        <button type="button" class="btn btn-info" onclick="timkiem()" name="xem" value="search" id="timkiemnc">Tìm kiếm</button>
                    </form>
                </div>
				<div class="boxmain">
				<div class='tit-boxmain'>
							<h3><span>KẾT QUẢ TÌM KIẾM</span></h3>
					</div>
				<div class='ct-boxmain row m0' id="trave">
					<?php 
						if($count == 0){
							echo "<h4 style='color:red;'>KHÔNG TÌM THẤY SẢN PHẨM</h4>";
						}
						else{
							while ($row=mysqli_fetch_array($run)){
								echo "
							<div class='col-xs-6 col-sm-4 col-md-3 p5 ss'>
								<div class='boxsp'>
			                		<div class='imgsp'>
			                			<a href='index.php?xem=chitietsanpham&id=$row[idSP]'><img class='imgproduct' src='admindt/update/$row[hinhanh]''></a>
			                			<div class='img-label'>
			                				<img src='images/hot.png'>
			                			</div>
			                		</div>
			                		<div class='namesp'>
			                			<a href='#'>$row[tensp]</a>
			                		</div>
			                		<div class='pricesp'>".number_format($row['gia'],0,',','.')." VNĐ</div>
			                		<div class='button-hd'>
				                		<a href='javascript:void(0)' onclick='themgiohang($row[idSP])'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
				                		<a href='index.php?xem=chitietsanpham&id=$row[idSP]'><i class='fa fa-eye' aria-hidden='true'></i></a>
				                	</div>
			                	</div>
							</div>
								";
							}
						}
					 ?>
		 		</div>
			</div>
			<div class="text-center">
						<nav aria-label="Page navigation example">
						  <ul class="pagination justify-content-center">
						      <?php 
						      	$s = "";
						      	//$tam = $_GET['xem'];
						      	echo '<li class="page-item">';
						      	if(($current_page > 1) && ($total_page > 1)){
						      		echo '<a class="page-link" href="index.php?key='.$keyword.'&idmin='.$giamin.'&idmax='.$giamax.'&idL='.$idL.'&xem=search&page='.($current_page-1).'"tabindex="-1" aria-disabled="true">Trở lại</a>';
						      	}
						    	echo "</li>";
						    
								for($i = 1 ; $i <= $total_page; $i++ ){
									if($i == $current_page && $s = "active"){
										echo '<li class="'.$s.'"><a class="page-link">'.$i.'</a></li>';
									}
									else {
										echo '<li><a class="page-link" href="index.php?key='.$keyword.'
										&idmin='.$giamin.'&idmax='.$giamax.'&idL='.$idL.'&xem=search&page='.$i.'">'.$i.'</a></li>';
									}
								}

						    echo '<li class="page-item">';
						      if(($current_page < $total_page) && ($total_page > 1)){
						      	echo '<a class="page-link" href="index.php?key='.$keyword.'&idmin='.$giamin.'&idmax='.$giamax.'&idL='.$idL.'&xem=search&page='.($current_page+1).'">Tiếp</a>';
						      	}
						   
						    echo "</li>";
						    ?>
						  </ul>
						</nav>
					</div>
		</div>