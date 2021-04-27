  <?php
  $conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
	mysqli_set_charset($conn, 'UTF8');
  ?>                            <div class="breadcrumb">
                    <span><a href="#">Home</a></span>
                    <span> / </span><span>Manager</span><span> / </span><span>Thống kê</span>
                </div>
                <div class="chart chart-bgred">
                    <?php
                    
                    
                    if(isset($_SESSION['dem']))
                    {
                      echo '<div class="chart__num">'.$_SESSION['dem'].'</div>';  
                    }
                    else echo '<div class="chart__num">0</div>'
                      ?>
                    <!--<div class="chart__num">12.558</div>-->
                    <div class="chart__label">Người Truy Cập</div>
                    <div class="chart__img chart__img-img1"></div>
                </div>
                <div class="chart chart-bgblue">
                    <?php
                        $sql = "SELECT SUM(soluong) FROM chitietdonhang";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        if($row['SUM(soluong)'] != null)
                                        echo '<div class="chart__num">
                                        '.$row['SUM(soluong)'].'</div>';
                                        else {
                                         echo '<div class="chart__num">
                                            0</div>';   
                                        }
                                    }
                                    $i++;
                                }
                            }
                    ?>           
                    <!--<div class="chart__num">9.823</div>-->
                    <div class="chart__label">Sản Phẩm Đã Bán</div>
                    <div class="chart__img chart__img-img2"></div>
                </div>
                <div class="chart chart-bgbluewhite">
                    <?php
                        $sql = "SELECT COUNT(idUser) FROM user";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        echo '<div class="chart__num">
                                        '.$row['COUNT(idUser)'].'</div>';
                                    }
                                    $i++;
                                }
                            }
                    ?>               
                    <!--<div class="chart__num">5.423</div>-->
                    <div class="chart__label">Khách Hàng</div>
                    <div class="chart__img chart__img-img3"></div>
                </div>
                <div class="chart chart-bgyellow">
                    <?php
                        $sql = "SELECT SUM(Tongtien) FROM donhang";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        if($row['SUM(Tongtien)'] != null)
                                        echo '<div class="chart__num">
                                        '.number_format($row['SUM(Tongtien)'],0,',','.').' VNĐ</div>';
                                        else {
                                         echo '<div class="chart__num">
                                            0 VNĐ</div>';   
                                        }
                                    }
                                    $i++;
                                }
                            }
                    ?>      
                    <!--<div class="chart__num">7.000.256.000 VNĐ</div>-->
                    <div class="chart__label">Doanh Thu</div>
                    <div class="chart__img chart__img-img4"></div>
                </div>
                <div class="section">
                    <div class="top-user__header">TOP USER</div>
                    <table id="top-user__table">
                        <thead>
                            
                            <tr>
                                <th>Top</th>
                                <th>Họ Tên</th>
                                <th>SĐT</th>
                                <th>Tổng Sản Phẩm Đã Mua</th>
                                <th>Tổng Giá Trị</th>     
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                                $sql = "SELECT user.hoten,user.SDT,COUNT(chitietdonhang.Soluong),SUM(donhang.Tongtien) FROM user,donhang,chitietdonhang WHERE user.idUser = donhang.idUser AND donhang.idHD=chitietdonhang.idHD GROUP BY user.idUser ORDER BY SUM(donhang.Tongtien) DESC";
                                $run = mysqli_query($conn,$sql);
                                $num = mysqli_num_rows($run);
                                $i = 0; 
                                if($num > 0)
                                {
                                    while ($row = mysqli_fetch_array($run)) {
                                        if($i <= $num){
                                            echo '<tr>
                                                    <td>'.($i + 1).'</td>
                                                    <td>'.$row['hoten'].'</td>
                                                    <td>'.$row['SDT'].'</td>
                                                    <td>'.$row['COUNT(chitietdonhang.Soluong)'].'</td>
                                                    <td>'.number_format($row['SUM(donhang.Tongtien)'],0,',','.').' VNĐ </td>
                                                </tr>';
                                        }
                                        $i++;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?xem=sanpham&id=1"><div class="thong-ke">
                    <?php
                        $sql = "SELECT COUNT(idSP) FROM sanpham";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        echo '<div class="thong-ke__num">
                                        '.$row['COUNT(idSP)'].'</div>';
                                    }
                                    $i++;
                                }
                            }
                    ?>
                    <!--<div class="thong-ke__num">55.222</div>-->
                    <div class="thong-ke__title">Tổng Sản Phẩm</div>
                    <div class="thong-ke__img img1"></div>
                </div></a>
                <a href="index.php?xem=khachhang&id=1"><div class="thong-ke">
                    <?php
                        $sql = "SELECT COUNT(idUser) FROM user";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        echo '<div class="thong-ke__num">
                                        '.$row['COUNT(idUser)'].'</div>';
                                    }
                                    $i++;
                                }
                            }
                    ?>                    
                    <!--<div class="thong-ke__num">11.513</div>-->
                    <div class="thong-ke__title">Khách Hàng</div>
                    <div class="thong-ke__img img2"></div>
                </div></a>
                <a href="index.php?xem=donhang&id=1"><div class="thong-ke">
                     <?php
                        $sql = "SELECT COUNT(idHD) FROM donhang";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        echo '<div class="thong-ke__num">
                                        '.$row['COUNT(idHD)'].'</div>';
                                    }
                                    $i++;
                                }
                            }
                    ?>                        
                    <!--<div class="thong-ke__num">11.513</div>-->
                    <div class="thong-ke__title">Đơn Hàng</div>
                    <div class="thong-ke__img img3"></div>
                </div></a>
                <a href="index.php?xem=danhmuc&id=1"><div class="thong-ke">
                     <?php
                        $sql = "SELECT COUNT(idLSP) FROM loaisanpham";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        echo '<div class="thong-ke__num">
                                        '.$row['COUNT(idLSP)'].'</div>';
                                    }
                                    $i++;
                                }
                            }
                    ?>    
                    <!--<div class="thong-ke__num">6</div>-->
                    <div class="thong-ke__title">Danh Mục SP</div>
                    <div class="thong-ke__img img4"></div>
                </div></a>
            </div>