<div class="breadcrumb">
                    <span><a href="../index.html">Home</a></span><span> / </span><span>Manager</span><span> / </span><span>Quản lý tài khoản</span>
                </div>
            <div class="section">
                <div class="them-sp"><button onclick="popup_themnv()">Thêm Nhân Viên</button></div>
                <table id="table-user">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã NV</th>
                            <th>Tên</th>
                            <th>SDT</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày Sinh</th>
                            <th>Giới tính</th>
                            <th>Lương</th>
                            <th>Trạng Thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
							$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
							mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM nhanvien";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        if($row['MaNV'] != "Admin")
                                        {
                                         echo '<tr>
                                                <td>'.$row['STT'].'</td>
                                                <td>'.$row['MaNV'].'</td>
                                                <td>'.$row['Ten'].'</td>
                                                <td>'.$row['SDT'].'</td>
                                                <td>'.$row['DiaChi'].'</td>
                                                <td>'.$row['NgaySinh'].'</td>
                                                <td>'.$row['GioiTinh'].'</td>
                                                <td>'.$row['Luong'].' $</td>
                                                <td>'.$row['Trangthai'].' </td>
                                                <td>
                                                    <button type="button" id = "'.$row['MaNV'].'" onclick="dongmotaikhoan('.$row['STT'].')">Đóng/Mở</button>
                                                </td>
                                            </tr>';   
                                        }                                       
                                    }
                                    $i++;
                                }
                            }
                        ?>
                        <script>
                            function dongmotaikhoan(idnv)
                            {
                                var answer = confirm("Xác nhận thao tác trên nhân viên " + idnv +"???" );
                                if (answer)
                                 {
                                        $.ajax({
                                        url : "modules/content/dongmotk.php",
                                        type : 'get',
                                        data: {
                                            id: idnv                                     
                                        },
                                        dataType : 'text',
                                        success : function (result){
                                            $('#table-user').html(result);
                                        }
                                         });
                                }
                            }
                        </script>

                        <!-- <tr>
                            <td>1</td>
                            <td>nguyen van anh</td>
                            <td>sdlijflkds kljsad </td>
                            <td>10005405321352</td>
                            <td>ákdfhl@gmasifjasj</td>
                            <td>nam</td>
                            <td>22/5/6895</td>
                            <td>
                                <button class="xoa_sp">Xóa</button><br>
                                <button class="sua_sp">Sửa</button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            </div>
        </div>
<form method="POST" id="form_themnv" enctype="multipart/form-data">
    <div class="popup-themsp" id = "dodulieunhanvien" style="display: none;">
        <div class="popup-themsp__content">
            <div class="popup-themsp__title">Thêm Thông Tin Cá Nhân</div>
            <div class="popup-themsp-left">
                <div class="popup-themsp-left__label">Mã NV</div>
                <div class="popup-themsp-left__label">Tên</div>
                <div class="popup-themsp-left__label">SĐT</div>
                <div class="popup-themsp-left__label">Địa chỉ</div>
                <div class="popup-themsp-left__label">Ngày sinh</div>
                <div class="popup-themsp-left__label">Giới tính</div>
                <div class="popup-themsp-left__label">Lương</div>
            </div>
            <div class="popup-themsp-right">
                <div class="popup-themsp-left__input" ><input type="text" placeholder="Mã nhân viên" name ="idnvs" id="idnvtieptheo" readonly></div>
                <div class="popup-themsp-left__input" ><input type="text" placeholder="Tên nhân viên" name ="tennv" ></div>
                <div class="popup-themsp-left__input"><input type="text" placeholder="Số điện thoại" name = "sdt" ></div>
                <div class="popup-themsp-left__input"><textarea name="diachis" rows="5" cols="20" placeholder="Địa chỉ ..." id="diachis"></textarea></div>
                <div class="popup-themsp-left__input"><input type="date" name = "ngaysinh" ></div>

                <div class="popup-themsp-left__input">
                    <SELECT name = "gioitinh" id = "gioitinhs">
                        <option>
                            Nam
                        </option>
                        <option>
                            Nữ
                        </option>
                    </SELECT>
                </div>
                <div class="popup-themsp-left__input"><input type="text" name = "luong" placeholder="Lương ..." ></div>
            </div>
            <button type ="submit" class="popup-suasp__btn" name = "clickthemnhanvien">Thêm</button>
            <span class="back" onclick="close_popup_themsp()">&times;</span>
        </div>
    </div>
</form>
<?php 
    include ("them.php");
 ?>