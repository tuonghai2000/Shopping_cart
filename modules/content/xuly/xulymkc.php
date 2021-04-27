<?php  include_once ("C:/xampp/htdocs/Shopping_cart/core/user_model.php");?>
<?php
	session_start(); 
	$id = $_SESSION['user']['iduser'];
	$password   = $_POST['pass'];
    $password = md5($password);
	$usermodel= new user_model();
	$run = $usermodel->get_user_by_idUser($id);
    $row = mysqli_fetch_array($run);
        if($password != $row['matkhau']){
            echo '<script> document.getElementById("lois").innerHTML ="Mật khẩu không khớp !!!" 
                document.getElementById("loi").innerHTML =""
                </script>';
        } 
        echo '
			<script> document.getElementById("lois").innerHTML ="";
           </script>
        ';
 ?>