
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="dangnhap/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Login Form
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="taikhoan" placeholder="Username" data-validate = "Username is required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<select class="input100" name ="dropdown">
							<option value = "1">Chọn phân quyền</option>
							<option value ="Admin">Admin</option>
							<option value ="Manager">Manager</option>
					</select>
					<div class="container-login100-form-btn">
						
						<button class="login100-form-btn" name = "click">
							Login
						</button>
						
					</div>

					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div> -->

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
<?php 

	session_start();
	$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("Kết nối thất bại");
	mysqli_set_charset($conn, 'UTF8');
	$thongbao="";
	$_SESSION['dangnhap']=0;
	$taikhoan = $_POST['taikhoan'];
	$pass = $_POST['pass'];	
	$phanquyen = $_POST['dropdown'];

	if(isset($_POST['click']))
	{
		if($phanquyen == "1") echo'<script>alert("Chọn phân quyền để đăng nhập")</script>';
		else
		{
			$sql = "SELECT * FROM nhanvien";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                    		if($row['MaNV'] == $taikhoan)
                                    		{
                                    			$checkpass = $row['Pass'];
                                    			$checkphanquyen = $row['PhanQuyen'];
                                    			$checktaikhoan = $row['MaNV'];
                                    			$checkkhoa = $row['Trangthai'];

                                    		}
                                      	// if($taikhoan != $row['MaNV']) 
                                      	// {
                                      	// 	$thongbao="Tài khoản không tồn tại";
                                      	// 	$_SESSION['dangnhap'] = 0;
                                      	// }
                                      	// else if ($pass != $row['Pass'])
                                      	// {
                                      	// 	$thongbao="Sai mật khẩu";
                                      	// 	$_SESSION['dangnhap'] = 0;
                                      	// }
                                      	// else if($row['Trangthai'] != "Mở khóa")
                                      	// {
                                      	// 	$thongbao="Tài khoản đã bị khóa, gọi cho SĐT 0123.837.465";
                                      	// 	$_SESSION['dangnhap'] = 0;
                                      	// }
                                      	// else if($row['PhanQuyen'] == $phanQuyen){
                                      	// 	if($phanquyen == "Manager")
                                      	// 	{
                                      	// 	$thongbao="Đăng nhập thành công";
                                      	// 	$_SESSION['dangnhap'] = 1;
                                      	// 	echo"<script>window.location='index.php'</script>";
                                      	// 	break;	
                                      	// 	}
                                      	// 	else
                                      	// 	{
                                      	// 		$thongbao="Đăng nhập thành công";
	                                      // 		$_SESSION['dangnhap'] = 2;
	                                      // 		echo"<script>window.location='index.php'</script>";
	                                      // 		break;	
                                      	// 	}
                                      		
                                      	// }
                                    }
                                    $i++;
                                }
                            }
    		if(!isset($checktaikhoan))
    			echo'<script>alert("Tài khoản không tồn tại")</script>';
    		else if ($pass != $checkpass)
    			echo'<script>alert("Mật khẩu sai")</script>';
    		else if($checkkhoa != "Mở khóa")
    			echo'<script>alert("Tài khoản bị khóa")</script>';
    		else if($phanquyen != $checkphanquyen)
    			echo'<script>alert("Thông tin sai")</script>';
    		else 
    		{
    			if($phanquyen == "Manager")
                {
                                      		
                    $_SESSION['dangnhap'] = 1;
                    $_SESSION['thongtincanhan'] = $taikhoan;
                   	echo"<script>window.location='index.php'</script>";                                     			
               }
               else
                {
                                      		
	                $_SESSION['dangnhap'] = 2;
	                $_SESSION['thongtincanhan'] = $taikhoan;
	               echo"<script>window.location='index.php'</script>";
	                                      	
             	}
    		}
		}

	}
	
?>

