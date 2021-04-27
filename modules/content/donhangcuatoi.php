<?php include_once ("C:/xampp/htdocs/Shopping_cart/core/donhang_model.php"); ?>
<?php
if(isset($_SESSION['user']))
{
		$iduser=$_SESSION['user']['iduser'];
		$hoten=$_SESSION['user']['hoten'];
	  $donhangmodel = new donhang_model();
	  $run = $donhangmodel->donhangcuatoi($iduser);
echo'<div class="col-xs-12 col-sm-8 col-md-9">';
	 echo'<h3>Đơn hàng của tôi</h3>
	    <table class="table">
	    	<tr class="tb">
	        	<th>STT</th>
	            <th>Mã đơn hàng</th>
	            <th>Tên khách hàng</th>
	            <th>Tổng tiền</th>
	            <th>Trạng thái đơn hàng</th>
				<th></th>
	        </tr>';
		$i=1;
while($row = mysqli_fetch_array($run)){
	if($row['trangthai'] == 0){
       echo'<tr class="tbrow">
        	<th>'.$i.'</th>
            <th>'.$row['idHD'].'</th>
            <th>'.$row['hoten_user'].'</th>
            <th>'.chuyendoi($row['tongtien']).' VNĐ</th>
			<td>Chưa xử lý</td>
            <th><a href="index.php?xem=taikhoancuatoi&id=chitietdonhang&idHD='.$row['idHD'].'">Xem chi tiết</a></th>
        </tr>';
    }
    else{
    	echo'<tr class="tbrow">
        	<th>'.$i.'</th>
            <th>'.$row['idHD'].'</th>
            <th>'.$row['hoten_user'].'</th>
            <th>'.chuyendoi($row['tongtien']).' VNĐ</th>
			<td>Đã xử lý</td>
            <th><a href="index.php?xem=taikhoancuatoi&id=chitietdonhang&idHD='.$row['idHD'].'">Xem chi tiết</a></th>
        </tr>';
    }
		$i++;
}
        echo'</table>';
		echo '</div>';
}
?>

