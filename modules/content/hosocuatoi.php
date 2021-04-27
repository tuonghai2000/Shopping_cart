<?php  include_once ("C:/xampp/htdocs/Shopping_cart/core/user_model.php");?>
<?php
if(isset($_SESSION['user']))
{
	  $iduser=$_SESSION['user']['iduser'];
	  $usermodel= new user_model();
	  $run = $usermodel->get_user_by_idUser($iduser);
	  $row= mysqli_fetch_array($run);
}
?>
<div class="col-xs-12 col-sm-8 col-md-9 ">

          <form class="form-horizontal "  action="" method="POST" id="boderform">
            <div class="labelform"><p style="text-align:center;">THÔNG TIN CÁ NHÂN</p></div>
            <div class="form-group ">  
              <label class="col-md-3 control-label" >Tên đăng nhập(*)
                <i class="fa fa-user prefix grey-text"></i>
              </label>
              <div class="col-md-7">
                <input type="text" name="user" class="form-control" id="user" value="<?php echo $row['tendangnhap'] ?>">
                <p  id="loiuser" style="color:red"></p>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-3 control-label">Họ Và Tên
              <i class="fa fa-user prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo $row['hoten'] ?>">
                <p  id="loifullname" style="color:red"></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Gmail
              <i class="fa fa-envelope prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="text" name="gmail" class="form-control" id="gmail" value="<?php echo $row['Gmail'] ?>">
                <p  id="loigmail" style="color:red"></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-md-3 control-label">Điện thoại
              <i class="fa fa-phone"></i>
              </label>
              <div class="col-md-7"><input type="text" name="SDT" class="form-control" id="phone" value="<?php echo $row['SDT'] ?>">
                <p  id="loiphone" style="color:red"></p>
               </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Địa chỉ
                <i class="fa fa-map-marker"></i>
                </label>
                <div class="col-md-7"><input type="text" name="Diachi" class="form-control" id="diachi" value="<?php echo $row['Diachi'] ?>">
                  <p  id="loidiachi" style="color:red"></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">
                </label>
                <div class="col-md-7">
                    <input type="checkbox" name="vehicle" id="check" onclick="show()"> Thay đổi mật khẩu<br>
                </div>
            </div>
            <div class="form-group" id="mkc">
              <label class="col-md-3 control-label">Mật khẩu cũ
              <i class="fa fa-lock prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="password" name="pass" class="form-control" id="pass" onkeyup="checkmkc()">
                <p id="lois"></p>
              </div>
            </div>
            <div class="form-group" id="mkm">
              <label class="col-md-3 control-label">Mật khẩu mới
              <i class="fa fa-lock prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="password" name="pass" class="form-control" id="passm" onkeyup="checkcdmk()">
                <p id="loim" style="color: red;"></p>
              </div>
            </div>
            <div class="form-group" id="mknl">
              <label class="col-md-3 control-label">Nhập lại mật khẩu
              <i class="fa fa-lock prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="password" name="pass" class="form-control" id="passnl" onkeyup="checkmkm()">
                <p id="loinl" style="color: red;"></p>
              </div>
            </div>
            <div class="nut">
              <button type="submit" name="dangky"  class="btn btn-info" onclick="testsuatt()">Cập nhập</button>
            </div>
          </form>
        </div>
        
<?php 
            if(isset($_POST['dangky'])){
			  $id=$row['idUser'];
              $username   = $_POST['user'];
              $password   = $_POST['pass'];
              $hoten = $_POST['fullname'];
              $gmail      = $_POST['gmail'];
              $Dienthoai   = $_POST['SDT'];
              $Diachi    = $_POST['Diachi'];
              $password = md5($password);
			  //$usermodel= new user_model();
			  $run =  $usermodel->update_user($id,$username,$password,$hoten,$gmail,$Dienthoai,$Diachi);
              }
         ?>