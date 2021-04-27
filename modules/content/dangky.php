<?php  include_once ("C:/xampp/htdocs/Shopping_cart/core/user_model.php"); ?>
      <div class="hidden-xs col-sm-4 col-md-3">
        <div class="boxleft">
          <div class="titboxl">
            <span>TÀI KHOẢN</span>
          </div>
          <div class="ctboxleft">
             <ul class="mnboxl">
                <li><a href="index.php?xem=dangky&id=1"><i class="fa fa-user-plus"></i>Đăng ký</a></li>
                <li><a href="index.php?xem=dangnhap&id=1"><i class="fa fa-sign-in"> </i>Đăng nhập</a></li>
                <li><a href=""><i class="fa fa-key"></i>Quên mật khẩu</a></li>
              </ul>
          </div>
        </div>
    </div>
        <div class="col-xs-12 col-sm-8 col-md-9 ">

          <form class="form-horizontal "  action="" method="POST" id="boderform">
            <div class="labelform"><p style="text-align:center;">ĐĂNG KÝ THÀNH VIÊN</p></div>
            <span class="badge">*Thông tin đăng nhập*</span>
            <div class="form-group ">  
              <label class="col-md-3 control-label">Tên đăng nhập(*)
                <i class="fa fa-user prefix grey-text"></i>
              </label>
              <div class="col-md-7">
                <input type="text" name="user" class="form-control" id="user" onkeyup="kiemtrauser()">
                <p  id="loiuser" style="color:red"></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Mật khẩu(*)
              <i class="fa fa-lock prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="password" name="password" class="form-control" id="pass">
                <p  id="loipass" style="color:red"></p>
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Nhập lại(*)
                <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                </label>
                <div class="col-md-7"><input type="password" name="repassword" class="form-control" id="repass">
                  <p  id="loirepass" style="color:red"></p>
                </div>
            </div>
            <span class="badge">*Thông tin cá nhân*</span>
             <div class="form-group">
              <label class="col-md-3 control-label">Họ Và Tên
              <i class="fa fa-user prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="text" name="fullname" class="form-control" id="fullname">
                <p  id="loifullname" style="color:red"></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Gmail
              <i class="fa fa-envelope prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="text" name="gmail" class="form-control" id="gmail">
                <p  id="loigmail" style="color:red"></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-md-3 control-label">Điện thoại
              <i class="fa fa-phone"></i>
              </label>
              <div class="col-md-7"><input type="text" name="SDT" class="form-control" id="phone">
                <p  id="loiphone" style="color:red"></p>
               </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Địa chỉ
                <i class="fa fa-map-marker"></i>
                </label>
                <div class="col-md-7"><input type="text" name="Diachi" class="form-control" id="diachi">
                  <p  id="loidiachi" style="color:red"></p>
                </div>
            </div>
            <div class="nut">
              <button type="submit" name="dangky"  class="btn btn-info" id="signup" >Đăng ký</button>
              <button type="reset" class="btn btn-info" id="reset">Nhập lại</button>
            </div>
          </form>
        </div>
        <?php 
            if(isset($_POST['dangky'])){
              $username   = $_POST['user'];
              $password   = $_POST['password'];
              $hoten = $_POST['fullname'];
              $gmail      = $_POST['gmail'];
              $Dienthoai   = $_POST['SDT'];
              $Diachi    = $_POST['Diachi'];
              $password = md5($password);
			  $usermodel= new user_model();
			  $run =  $usermodel->inser_user($username,$password,$hoten,$gmail,$Dienthoai,$Diachi);
             
              //echo "<script>window.location='index.php?xem=dangnhap&id=1'</script>";
              }
         ?>
