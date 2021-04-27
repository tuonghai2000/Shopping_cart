<?php 
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	$sanphammodel= new sanpham_model();
	$sanpham = $sanphammodel->get_sanpham_by_idLSP($id);
	$count = mysqli_num_rows($sanpham);
	$total_records = $count;
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 8;
	$total_page = ceil($total_records/$limit);
	
	if($current_page > $total_page){
		$current_page = $total_page;
	}
	else if ($current_page < 1) {
		$current_page = 1;
	}
	$start = ($current_page -1)*$limit;
	}
	
?>
							
<div id="maincontent" class="col-xs-12 col-sm-8 col-md-12">
	<div  class="text-left">
                    <form action="index.php" method="get">
                    	<label>TÌM KIẾM NÂNG CAO:</label>
                        <input type="text" class="timnc" name="key" value="" placeholder="Nhập sản phẩm" id="tennc">
                        <span>GIÁ: </span>
                        <input type="text" name="giatu" placeholder="Giá từ" class="timnc" id="giatu" onkeyup="kiemtraso()">
                        <input type="text" name="giaden" placeholder="Giá đến" class="timnc" id="giaden" onkeyup="kiemtrasoden()">
                        <span>LOẠI: </span><select name="idL" class="timnc" id="loai">
                                <option value="0">TẤT CẢ</option>
                                <?php 
                                	$loaisanpham = $loaisanphammodel->get_all_loaisanpham();
                                	while ($row = mysqli_fetch_array($loaisanpham)) {
                                		echo '<option value="'.$row['idLSP'].'">'.$row['tenloai'].'</option>';
                                	}
                                 ?>
                                
                        </select>
                        <button type="button" class="btn btn-info" onclick="timkiem()" name="xem" value="search" id="timkiemnc">Tìm kiếm</button>
                    </form>
                </div>
				<div class="boxmain">
				<div class='tit-boxmain'>
							<?php 
					            $loaisanpham = $loaisanphammodel->get_loaisanpham_by_ibLSP($id);
					            $row = mysqli_fetch_array($loaisanpham,MYSQLI_ASSOC);
					            echo "<h3><span>ĐIỆN THOẠI ".$row['tenloai']."</span></h3>";
					        ?>
				</div>
				<div class='ct-boxmain row m0' id="loaisp">
					<?php 
						$sanphammodel= new sanpham_model();
				        $sanpham = $sanphammodel->get_sanpham_by_idLSP_phantrang($id,$start,$limit);
				             while ($row=mysqli_fetch_array($sanpham)) {	 
								echo "
									<div class='col-xs-6 col-sm-4 col-md-3 p5'>
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
				                		<a href='javascript:void(0)' onclick='themgiohang($row[idSP])' data-toggle ='snackbar' data-content = 'Thêm thành công'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
				                		<a href='index.php?xem=chitietsanpham&id=$row[idSP]'><i class='fa fa-eye' aria-hidden='true'></i></a>
				                	</div>
			                	</div>
								</div>
							";
						}
					?>
				</div>
		 </div>
		 <div class="text-center">
						<nav aria-label="Page navigation example">
						  <ul class="pagination justify-content-center">
						      <?php 
						      	$s = "";
						      	echo '<li class="page-item">';
						      	if(($current_page > 1) && ($total_page > 1)){
						      		echo '<a class="page-link" href="index.php?xem=loaisanpham&id='.$id.'&page='.($current_page-1).'"tabindex="-1" aria-disabled="true">Trở lại</a>';
						      	}
						    	echo "</li>";
						    
								for($i = 1 ; $i <= $total_page; $i++ ){
									if($i == $current_page && $s = "active"){
										echo '<li class="'.$s.'"><a class="page-link">'.$i.'</a></li>';
									}
									else {
										echo '<li><a class="page-link" href="index.php?xem=loaisanpham&id='.$id.'&page='.$i.'" id="trang">'.$i.'</a></li>';
									}
								}

						    echo '<li class="page-item">';
						      if(($current_page < $total_page) && ($total_page > 1)){
						      	echo '<a class="page-link" href="index.php?xem=loaisanpham&id='.$id.'&page='.($current_page+1).'">Tiếp</a>';
						      	}
						   
						    echo "</li>";
						    ?>
						  </ul>
						</nav>
					</div>
</div>				    
<script>
		var dem = 0;
		document.getElementById("trang").addEventListener('click', function(){
			dem = dem + 1;
			$.get("modules/content/loaisanpham.php",{page:dem},function(data){
				$("#loaisp").html(data);
			});	
		});
</script>