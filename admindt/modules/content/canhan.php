<div class="breadcrumb">
   <span><a href="../index.html">Home</a></span><span> / </span><span><?php echo $_SESSION['thongtincanhan'];  ?></span><span> / </span><span>Thông tin cá nhân</span>
</div>
<div class="section">
    <table id="table-user">
        <thead>
            <tr>
                <th>Tên</th>
                <th>SDT</th>
                <th>Địa Chỉ</th>
                <th>Ngày Sinh</th>
                <th>Giới tính</th>
                <th>Lương</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
			$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("Kết nối thất bại");
			mysqli_set_charset($conn, 'UTF8');
                            //session_start();
            $timkiem = $_SESSION['thongtincanhan'];
            $sql = "SELECT * FROM nhanvien WHERE MaNV = '$timkiem'";
                            //echo '<script>alert("'.$timkiem.'")</script>';
            $run = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($run);
            $i = 0; 
            if($num > 0)
            {
                while ($row = mysqli_fetch_array($run)) {
                    if($i <= $num){
                        echo '<tr>
                        <td>'.$row['Ten'].'</td>
                        <td>'.$row['SDT'].'</td>
                        <td>'.$row['DiaChi'].'</td>
                        <td>'.$row['NgaySinh'].'</td>
                        <td>'.$row['GioiTinh'].'</td>
                        <td>'.$row['Luong'].' $</td>
                        <td>
                        <button type="button" class ="sua_sp" id = "'.$row['STT'].'" onclick="suacanhan('.$row['STT'].')">Sửa</button>
                        <button type="button" class ="sua_sp" onclick="doipass('.$row['STT'].')">Đổi Pass</button>
                        </td>
                        </tr>';
                    }
                    $i++;
                }
            }
            ?>


        </tbody>
    </table>
</div>
</div>
</div>
<form method="POST" id="form_sua" enctype="multipart/form-data">
    <div class="popup-suasp" id = "dodulieucanhan">
        <div class="popup-suasp__content">
            <div class="popup-themsp__title">Sửa Thông Tin Cá Nhân</div>
            <div class="popup-themsp-left">
                <div class="popup-themsp-left__label">Mã NV</div>
                <div class="popup-themsp-left__label">Tên</div>
                <div class="popup-themsp-left__label">SĐT</div>
                <div class="popup-themsp-left__label">Địa chỉ</div>
                <div class="popup-themsp-left__label">Ngày sinh</div>
                <div class="popup-themsp-left__label">Giới tính</div>
            </div>
            <div class="popup-themsp-right">
                <div class="popup-themsp-left__input" ><input type="text" placeholder="Mã nhân viên" name ="idnvs" id="idnvs" readonly></div>
                <div class="popup-themsp-left__input" ><input type="text" placeholder="Tên nhân viên" name ="tennvs" id="tennvs"></div>
                <div class="popup-themsp-left__input"><input type="text" placeholder="Số điện thoại" name = "sdts" id="sdts"></div>
                <div class="popup-themsp-left__input"><textarea name="diachis" rows="5" cols="20" placeholder="Địa chỉ ..." id="diachis"></textarea></div>
                <div class="popup-themsp-left__input"><input type="date" name = "ngaysinhs" id="ngaysinhs"></div>
                <div class="popup-themsp-left__input">
                    <SELECT name = "gioitinhs" id = "gioitinhs">
                        <option>
                            Nam
                        </option>
                        <option>
                            Nữ
                        </option>
                    </SELECT>
                </div>
            </div>
            <button type ="submit" class="popup-suasp__btn" name = "clicksuanhanvien">Sửa</button>
            <span class="back" onclick="close_popup_suasp()">&times;</span>
        </div>
    </div>
</form>

<form method="POST">
    <div class="popup-suasp">
        <div class="popup-suasp__content">
            <div class="popup-themsp__title">Sửa Mật Khẩu</div>
            <div class="popup-themsp-left">
                <div class="popup-themsp-left__label">Mã NV</div>
                <div class="popup-themsp-left__label">Mật khẩu cũ</div>
                <div class="popup-themsp-left__label">Mật khẩu mới</div>
                <div class="popup-themsp-left__label">Nhập lại mật khẩu</div>
                
            </div>
            <div class="popup-themsp-right">
                <div class="popup-themsp-left__input" ><input type="text" name ="idnvsp" readonly id="idnvsp"></div>
                <div class="popup-themsp-left__input" ><input type="password" placeholder="Mật khẩu cũ ..." name ="pass" ></div>
                <div class="popup-themsp-left__input" ><input type="password" placeholder="Mật khẩu mới ..." name ="newpass" ></div>
                <div class="popup-themsp-left__input"><input type="password" placeholder="Nhập lại ..." name = "repass" ></div>
                <button type ="submit" class="popup-suasp__btn" name = "clickdoipass">Sửa</button>
                <span class="back" onclick="close_popup_suasp()">&times;</span>
            </div>
        </div>
    </div>
    </form>

    <?php 
    include ("suacanhanphp.php");
    include ("doipass.php");
    ?> 

