            <div class="header">
                <span class="title-header">Manager AREA</span>
                <div class="nav-right">
                    <img src="image/icon/user-icon.svg">
                    <a class="ten-admin" href="index.php?xem=canhan&id=1"><?php echo $_SESSION['thongtincanhan'] ?></a>
                    <a href="login.php">
                        <div style="font-size: 15px;margin:17px 8px 0 8px">Đăng Xuất</div>
                    </a>
                </div>
            </div>
            <div class="left-menu">
                <a class="left-menu__item active" href="index.php?xem=thongke&id=1"><span id="speed-icon"></span>Thống kê</a>
                <a class="left-menu__item" href="index.php?xem=sanpham&id=1"><span class="icon" id="product-icon"></span>Quản lý sản phẩm</a>
                <a class="left-menu__item" href="index.php?xem=khachhang&id=1"><span class="icon" id="user-icon"></span>Quản lý khách hàng</a>
                <a class="left-menu__item" href="index.php?xem=donhang&id=1"><span class="icon" id="don-hang-icon"></span>Quản lý đơn hàng</a>
                <a class="left-menu__item" href="index.php?xem=danhmuc&id=1"><span class="icon" id="danh-muc-icon"></span>Quản lý danh mục</a>
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
                            case 'thongke': include ("content/thongke.php"); break;
                            case 'sanpham': include ("content/qlsp.php"); break;
                            case 'khachhang': include ("content/qlkh.php"); break;
                            case 'danhmuc': include ("content/qldm.php"); break;
                            case 'donhang': include ("content/qldh.php"); break;
                            case 'canhan': include ("content/canhan.php"); break;

                        }
                ?>
                <!--dash board-->
            <div class="footer">
                <div>Powered by <a href="#"> World Phone</a></div>
            </div>