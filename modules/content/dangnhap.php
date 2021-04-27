 
     <div class="hidden-xs col-sm-4 col-md-3">
            <div class="boxleft">
              <div class="titboxl">
                <span>ĐĂNG NHẬP TÀI KHOẢN</span>
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
          <form class="form-horizontal" action="" method="POST" id="boderform">
            <div class="labelform"><p style="text-align:center;">ĐĂNG NHẬP</p></div>
            <div class="form-group ">  
              <label class="col-md-3 control-label">Tên đăng nhập
              <i class="fa fa-user prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="text" name="username" class="form-control" id="user">
                <p id="loi"></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Mật khẩu
              <i class="fa fa-lock prefix grey-text"></i>
              </label>
              <div class="col-md-7"><input type="password" name="pass" class="form-control" id="pass">
                <p id="lois"></p>
              </div>
            </div>
            <div class="nut">
              <button type="button" name="dangnhap" class="btn btn-info" id="signup" onclick="checktk();">Đăng nhập</button>
              <button type="reset" class="btn btn-info" id="reset">Thoát</button>
            </div>
          </form>
        </div>