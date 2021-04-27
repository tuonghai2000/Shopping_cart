<div class="breadcrumb">
					<span><a href="../index.html">Home</a></span><span> / </span><span>Manager</span><span> / </span><span>Quản lý User</span>
				</div>
            <div class="section">
                <table id="table-user">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ Tên</th>
                            <th>Địa Chỉ</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
							$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
							mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM user order by idUser asc";
                            $run = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($run);
                            $i = 0; 
                            if($num > 0)
                            {
                                while ($row = mysqli_fetch_array($run)) {
                                    if($i <= $num){
                                        echo '<tr>
                                                <td>'.$row['idUser'].'</td>
                                                <td>'.$row['hoten'].'</td>
                                                <td>'.$row['Diachi'].'</td>
                                                <td>'.$row['SDT'].'</td>
                                                <td>'.$row['Gmail'].'</td>
                                                <td>
                                                    <button class="xoa_sp">Xóa</button><br>
                                                </td>
                                            </tr>';
                                    }
                                    $i++;
                                }
                            }
                        ?>

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
            <div class="footer">
                <div>Powered by <a href="../index.html"> World Phone</a></div>
            </div>
