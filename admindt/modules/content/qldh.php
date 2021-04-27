<div class="breadcrumb">
	<span><a href="../index.html">Home</a></span><span> / </span><span>Manager</span><span> / </span><span>Quản lý Đơn hàng</span>
</div>
<div class="section">
	<table id="table-dh">
		<thead>
			<tr>
				<th colspan="8">DANH SÁCH ĐƠN HÀNG</th>
			</tr>
			<tr>
				<th colspan="4">Chọn ngày
					<input type="date" id="ngaytu" value="2019-05-01" ><span> -> </span><input type="date" id="ngayden" value="2019-05-14" >
				</th>
				<th colspan="1">
					<button type="button" onclick="timkiemngay()">Tìm kiếm</button>
					<script type="text/javascript">
						function timkiemngay()
						{
							var ngaytu = document.getElementById("ngaytu").value;
							var ngayden = document.getElementById("ngayden").value;
							var id = document.getElementById("trang_thai").value;

							$.ajax({
							url : "modules/content/timkiemngay.php",
							type : 'get',
							data: {
								ngaytu : ngaytu,
								ngayden : ngayden,
								id : id                                   
							},
							dataType : 'text',
							success : function (result){
								$('#tinhtranghd').html(result);
							}
				});
						}
					</script>
				</th>
				<th colspan="3">Trạng thái
					<select id="trang_thai" onchange = "tinhtrang(this)">
						<option value="1">Đã xử lý</option>
						<option value="0">Chưa xử lý</option>
						<option value="2" selected>Tất cả</option>
					</select>
				</th>
			</tr>
			<tr>
				<th>Mã HD</th>
				<th>Tên Khách</th>
				<th>Gmail</th>
				<th>SĐT</th>
				<th>Thời Điểm Đặt Hàng</th>
				<th>Tổng Tiền</th>
				<th>Tình Trạng</th>
				<th>Thao Tác</th>
			</tr>
		</thead>
		<tbody id = "tinhtranghd" >
			<?php
			$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
			mysqli_set_charset($conn, 'UTF8');
			$sql = "SELECT * FROM donhang";
			$run = mysqli_query($conn,$sql);
			$num = mysqli_num_rows($run);
			$tongtien = 0;
			$tinhtrang;
			$i = 0; 
			if($num > 0)
			{
				while ($row = mysqli_fetch_array($run)) {
					if($i <= $num){
						if($row['trangthai'] == 1)
						{
							$tinhtrang = "Đã xử lý";
							echo '<tr onclick = "popup_cthd('.$row['idHD'].')">
							<td>'.$row['idHD'].'</td>
							<td>'.$row['hoten_user'].'</td>
							<td>'.$row['Gmail_user'].'</td>
							<td>'.$row['phone'].'</td>
							<td>'.$row['Ngaytao'].'</td>
							<td>'.number_format($row['Tongtien'],0,',','.').' VNĐ</td>
							<td>'.$tinhtrang.'</td>                                             
							<td>Hoàn thành</td>
							</tr>'; 
							$tongtien += $row['Tongtien'];
						}
						
						else 
						{
							$tinhtrang = "Chưa xử lý";
							echo '<tr onclick = "popup_cthd('.$row['idHD'].')">
							<td>'.$row['idHD'].'</td>
							<td>'.$row['hoten_user'].'</td>
							<td>'.$row['Gmail_user'].'</td>
							<td>'.$row['phone'].'</td>
							<td>'.$row['Ngaytao'].'</td>
							<td>'.number_format($row['Tongtien'],0,',','.').' VNĐ</td>
							<td>'.$tinhtrang.'</td>                                             
							<td>
							<button class="xoa_sp" type="button" id = "'.$row['idHD'].'" onclick = xuly('.$row['idHD'].')>Xử lý</button>
							</td>
							</tr>';   
							$tongtien += $row['Tongtien'];
						}
						
						
					}
					$i++;
				}
				echo '<tr> 
        <td style = "color:red;">Tổng tiền</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style = "color:red;">'.number_format($tongtien,0,',','.').' VNĐ</td>
        <td></td>
        <td></td>
        
      </tr>';
			}
			?>

		</tbody>
		<script>
			function xuly(idhd) {
				$.ajax({
					url : "modules/content/xulyhd.php",
					type : 'get',
					data: {
						id: idhd                                     
					},
					dataType : 'text',
					success : function (result){
						$('#table-dh').html(result);
					}
				});
			}
			function tinhtrang(obj)
			{
				var value = obj.value;

				$.ajax({
					url : "modules/content/xulytinhtrang.php",
					type : 'get',
					data: {
						id: value                                     
					},
					dataType : 'text',
					success : function (result){
						$('#tinhtranghd').html(result);
					}
				});
			}
		</script>
	</table>
</div>
</div>
</div>
<!-- popup khi ấn vào thì ra được chi tiết đơn hàng, ở trên bảng chỉ hiện đơn hàng mà thôi -->
<div class="popup-cthd" style="display: none">
	<div class="popup-themsp__content" >
		<div class="popup-themsp__title">Chi Tiết Đơn Hàng</div>
		
		<table id="table-dh">
			<thead>
				<tr>
					<th>Mã HĐ</th>
					<th>Mã SP</th>
					<th>Đơn giá</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>	
				</tr>
			</thead>
			<tbody id = "dulieuchitiet">
				
			</tbody>
			
		</table>
				<!-- <div class="popup-themsp-left">
					<div class="popup-themsp-left__label">Mã SP</div>
					<div class="popup-themsp-left__label">Đơn giá</div>
					<div class="popup-themsp-left__label">Thành tiền</div>
					
				</div>
				<div class="popup-themsp-right">
					<div class="popup-themsp-left__input">xxx</div>
					<div class="popup-themsp-left__input">xxx</div>
					<div class="popup-themsp-left__input">xxx</div>
				</div> -->
				<span class="back" onclick="close_popup_cthd()">&times;</span>
			</div>
		</div>
		
	
