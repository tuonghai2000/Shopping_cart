<?php 
$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
mysqli_set_charset($conn, 'UTF8');
$result = mysqli_query($conn,"SELECT count(idSP) as total from sanpham ");
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;
$total_page = ceil($total_records/$limit);

if($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page -1)*$limit;

?>
<div class="breadcrumb">
    <span><a href="../index.html">Home</a></span><span> / </span><span>Manager</span><span> / </span><span>Quản lý sản phẩm</span>
</div>
<div class="section">
    <div class="them-sp"><button onclick="popup_themsp()">Thêm Sản Phẩm</button></div>
    <table id="table-sp">
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Hình</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            
        <?php
        $run = mysqli_query($conn,"SELECT * FROM sanpham,loaisanpham WHERE sanpham.idLSP = loaisanpham.idLSP order by idSP asc Limit $start , $limit");
        while ($row = mysqli_fetch_assoc($run)) {
            echo ' <tr>
            <td>'.$row['idSP'].'</td>
            <td><img src="update/'.$row['hinhanh'].'" width="110px"></td>
            <td>'.$row['tensp'].'</td>
            <td>'.number_format($row['gia'],0,',','.').' VNĐ</td>
            <td>'.$row['tenloai'].'</td>
            <td>
            <button id = "'.$row['idSP'].'"class="xoa_sp" onclick ="xacnhanxoa('.$row['idSP'].')">Xoá</button><br>
            <button class="sua_sp" onclick="popup_suasp('.$row['idSP'].')">Sửa</button>
            </td>
            </tr>';
            
        }
        
        ?>

    </tbody>
</table>
<div class="text-center">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                      <?php 

                      $s = "";
                      echo '<li class="page-item">';
                      if(($current_page > 1) && ($total_page > 1)){
                        echo '<a class="page-link" href="index.php?xem=sanpham&id=1&page='.($current_page-1).'" aria-disabled="true">Trở lại</a>';
                    }
                    echo "</li>";
                    
                    for($i = 1 ; $i <= $total_page; $i++ ){
                        if($i == $current_page && $s = "active"){
                            echo '<li class="'.$s.'"><a class="page-link">'.$i.'</a></li>';
                        }
                        else {
                            echo '<li><a class="page-link" href="index.php?xem=sanpham&id=1&page='.$i.'">'.$i.'</a></li>';
                        }
                    }

                    echo '<li class="page-item">';
                    if(($current_page < $total_page) && ($total_page > 1)){
                        echo '<a class="page-link" href="index.php?xem=sanpham&id=1&page='.($current_page+1).'">Tiếp</a>';
                    }
                    
                    echo "</li>";
                    ?>
                </ul>
            </nav>
        </div>
</div>
</div>
</div>
<!-- popup thêm sp -->
<form method="POST" enctype="multipart/form-data">
    <div class="popup-themsp">
        <div class="popup-themsp__content">
            <div class="popup-themsp__title">Thêm Sản Phẩm</div>
            <div class="popup-themsp-left">
                <div class="popup-themsp-left__label">Nhập Têns</div>
                <div class="popup-themsp-left__label">Nhập Giá</div>
                <div class="popup-themsp-left__label">Chọn Hình</div>
                <div class="popup-themsp-left__label">Chọn Loại</div>
                <div class="popup-themsp-left__label">Mã Loại</div>
                <div class="popup-themsp-left__label">Mô tả</div>
                
            </div>
            <div class="popup-themsp-right">
                <div class="popup-themsp-left__input" ><input type="text" placeholder="Tên sản phẩm" name ="ten"></div>
                <div class="popup-themsp-left__input"><input type="text" placeholder="Giá sản phẩm" name = "gia"></div>
                <div class="popup-themsp-left__input" ><input type="file" name="hinhanh" id="file" onchange="return fileValidationt()"></div>
                <div class="popup-themsp-left__input" ><select name="dropdown" onchange="chon(this)">
                    <?php
                    $sql = "SELECT * FROM loaisanpham order by idLSP asc";
                    $run = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($run);
                    $i = 0; 
                    if($num > 0)
                    {
                        while ($row = mysqli_fetch_array($run)) {
                            if($i <= $num){
                                echo '<option value="'.$row['idLSP'].'">'.$row['tenloai'].'</option>';
                            }
                            $i++;
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="popup-themsp-left__input" id="loai" ></div>
            <script language="javascript">
                function chon(obj)
                {
                        // Lấy danh sách các options
                        var options = obj.children;
                        
                        // Biến lưu trữ các chuyên mục đa chọn
                        var html = '';
                        
                        // lặp qua từng option và kiểm tra thuộc tính selected
                        for (var i = 0; i < options.length; i++){
                            if (options[i].selected){
                                html = '<p>'+options[i].value+'</p>';
                            }
                        }
                        //alert(html);
                        // Gán kết quả vào loai
                        document.getElementById('loai').innerHTML = html;
                    }
                    function chons(obj)
                    {
                        // Lấy danh sách các options
                        var options = obj.children;
                        
                        // Biến lưu trữ các chuyên mục đa chọn
                        var html = '';
                        
                        // lặp qua từng option và kiểm tra thuộc tính selected
                        for (var i = 0; i < options.length; i++){
                            if (options[i].selected){
                                html = '<p>'+options[i].value+'</p>';
                            }
                        }
                        //alert(html);
                        // Gán kết quả vào loai
                        document.getElementById('loais').innerHTML = html;
                    }
                </script>
                <div class="popup-themsp-left__input"><textarea name="mota" rows="5" cols="20" placeholder="Mô tả tại đây..."></textarea></div>
            </div>

            <button type ="submit" class="popup-themsp__btn" name ="clickthem">Thêm</button>
            <div id = "imagePreviewt"><img src="image/img-01.png" class="sua-hinh" width="110" /></div>

            <script>
                function fileValidationt(){
                    var fileInput = document.getElementById('file');
                var filePath = fileInput.value;//lấy giá trị input theo id
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
                //Kiểm tra định dạng
                if(!allowedExtensions.exec(filePath)){
                    alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
                    fileInput.value = '';
                    return false;
                }else{
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreviewt').innerHTML = '<img src="'+e.target.result+'" class="sua-hinh" width="110" height="300"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
        function xacnhanxoa(idsp)
        {
            var answer = confirm("Xác nhận xóa sản phẩm" + idsp +"???" )
            if (answer) {
                $.ajax({
                    url : 'modules/content/xoasp.php',
                    type : 'get',
                    data: {
                        id: idsp
                        
                    },
                    dataType : 'text',
                    success : function (result){
                        $('#table-sp').html(result);
                    }
                });
            }
            else {
                        //some code
                    }
                }
                function fileValidations(){
                    var fileInput = document.getElementById('files');
                var filePath = fileInput.value;//lấy giá trị input theo id
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
                //Kiểm tra định dạng
                if(!allowedExtensions.exec(filePath)){
                    alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
                    fileInput.value = '';
                    return false;
                }else{
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreviews').innerHTML = '<img src="'+e.target.result+'" class="sua-hinh" width="110" height="300"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
        
        
    </script>

    <span class="back" onclick="close_popup_themsp()">&times;</span>
    
    
</div>
</div>
</form>
<!-- popup sửa sp -->
<form method="POST" id="form_sua" enctype="multipart/form-data">
    <div class="popup-suasp" id = "dodulieu">
        <div class="popup-suasp__content">
            <div class="popup-themsp__title">Sửa Sản Phẩm</div>
            <div class="popup-themsp-left">
                <div class="popup-themsp-left__label">Mã SP</div>
                <div class="popup-themsp-left__label">Nhập Tên</div>
                <div class="popup-themsp-left__label">Nhập Giá</div>
                <div class="popup-themsp-left__label">Chọn Hình</div>
                <div class="popup-themsp-left__label">Chọn Loại</div>
                <div class="popup-themsp-left__label">Mã Loại</div>
                <div class="popup-themsp-left__label">Mô tả</div>
                
            </div>
            <div class="popup-themsp-right">
                <div class="popup-themsp-left__input" ><input type="text" placeholder="Mã loại" name ="idsps" id="idsp" readonly></div>
                <div class="popup-themsp-left__input" ><input type="text" placeholder="Tên sản phẩm" name ="tens" id="tensp"></div>
                <div class="popup-themsp-left__input"><input type="text" placeholder="Giá sản phẩm" name = "gias" id="giasp"></div>
                <div class="popup-themsp-left__input" id = "hinhanhs"><input type="file" name="hinhanhs" id="files" onchange="return fileValidations()"></div>
                <div class="popup-themsp-left__input" >
                    <select name="dropdowns" onchange="chons(this)" id="loaisp">
                        <?php
                        $sql = "SELECT * FROM loaisanpham order by idLSP asc";
                        $run = mysqli_query($conn,$sql);
                        $num = mysqli_num_rows($run);
                        $i = 0; 
                        if($num > 0)
                        {
                            while ($row = mysqli_fetch_array($run)) {
                                if($i <= $num){
                                    echo '<option value="'.$row['idLSP'].'">'.$row['tenloai'].'</option>';
                                }
                                $i++;
                            }
                        }
                        ?>

                    </select>
                </div>
                <div class="popup-themsp-left__input" id="loais" ></div>
                <div class="popup-themsp-left__input"><textarea name="motas" rows="5" cols="20" placeholder="Mô tả tại đây..." id="mota"></textarea></div>

            </div>
            <button type ="submit" class="popup-suasp__btn" name = "clicksua">Sửa</button>
            <span class="back" onclick="close_popup_suasp()">&times;</span>
            <div id = "imagePreviews"></div>
        </div>
    </div>
</form>
<?php 
include ("themsp.php");
include ("suasp.php");
?>  
