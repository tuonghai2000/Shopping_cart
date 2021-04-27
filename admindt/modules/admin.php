<div class="header">
                <span class="title-header">ADMIN AREA</span>
                <div class="nav-right">
                    <img src="image/icon/user-icon.svg">
                    <div class="ten-admin">Admin</div>
                    <a href="login.php">
                        <div style="font-size: 15px;margin:17px 8px 0 8px">Đăng Xuất</div>
                    </a>
                </div>
            </div>
            <div class="left-menu">
                <a class="left-menu__item active" href="index.php?xem=canhan&id=1"><span id="speed-icon"></span>Thông tin cá nhân</a>
                <a class="left-menu__item" href="index.php?xem=taikhoan&id=1"><span class="icon" id="user-icon"></span>Quản lý tài khoản</a>
                <div class="copyright">&copy Nova Phone 2019</div>
            </div>
            <div class="main">
                <!--dash board-->
                <?php 
                    if(isset($_GET['xem']))
                    {
                        $tam = $_GET['xem'];
                    }
                    else $tam = '';

                    switch ($tam)
                        {
                            case 'canhan': include ("content/canhan.php"); break;
                            case 'taikhoan': include ("content/qltk.php"); break;
                        }
                ?>
                <!--dash board-->
            <div class="footer">
                <div>Powered by <a href="#"> World Phone</a></div>
            </div>