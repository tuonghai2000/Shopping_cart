<?php  include_once ("C:/xampp/htdocs/Shopping_cart/core/user_model.php");?>
<?php 
		$username = $_POST['user'];
		$usermodel= new user_model();
		$run = $usermodel->get_user_by_username($username);
		if(mysqli_num_rows($run)>0){
			echo '<p  id="loiuser" style="color:red"></br>Tên đăng nhập đã bị trùng mời nhập lại!!!</p>';
		}
 ?>