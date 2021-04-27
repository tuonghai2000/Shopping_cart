<div class="breadcrumb">
    <span><a href="../index.html">Home</a></span><span> / </span><span>Manager</span><span> / </span><span>Quản lý danh mục</span>
</div>
<div class="section">
    <div class="them-sp" onclick="popup_themsp()"><button>Thêm Danh Mục</button></div>
    <table id="table-dm">
     <thead>
      <tr>
       <th>STT</th>
       <th>Tên Danh Mục</th>
       <th>Mã Danh Mục</th>
       <th>Thao tác</th>
   </tr>
</thead>
<tbody>
    <?php
	$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
	mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM loaisanpham order by idLSP asc";
    $run = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($run);
    $i = 0; 
    if($num > 0)
    {
        while ($row = mysqli_fetch_array($run)) {
            if($i <= $num){
                echo '<tr>
                <td>'.$row['idLSP'].'</td>
                <td>'.$row['tenloai'].'</td>
                <td>'.$row['maloai'].'</td>
                <td>
                <button class="xoa_sp" id = "'.$row['idLSP'].'" 
                onclick = xacnhanxoadm('.$row['idLSP'].')>Xoá</button><br>
                <button class="sua_sp" onclick=popup_suadmsp('.$row['idLSP'].')>Sửa</button>
                </td>
                </tr>';
            }
            $i++;
        }
    }
    ?>
    <script type="text/javascript">
        function xacnhanxoadm(iddm)
        {
            var answer = confirm("Xác nhận xóa danh mục " + iddm +"???" )
            if (answer) {
                $.ajax({
                    url : 'modules/content/xoadm.php',
                    type : 'get',
                    data: {
                        id: iddm
                        
                    },
                    dataType : 'text',
                    success : function (result){
                        $('#table-dm').html(result);
                    }
                });       
            } 
        }    
        function popup_suadmsp(id) {
            //Dòng hiện bảng popup
            document.getElementsByClassName('popup-suasp')[0].style.display = 'block';
            //Đổ dữ liệu vào
            $.ajax({
                url : 'modules/content/dodulieudm.php',
                type : 'get',
                data: {
                    id: id
                },
                dataType : 'text',
                success : function (result){
                    var getdata = $.parseJSON(result);
                    $("#iddms").val(getdata.iddms);
                    $("#tendms").val(getdata.tendms);
                    
                }
            }); 
        }       

    </script>
</tbody>
</table>
</div>
</div>
</div>

<!-- popup thêm sp -->
<form method="POST">
    <div class="popup-themsp">
        <div class="popup-suadm__content">
            <div class="popup-themsp__title">Thêm Danh Mục</div>
            <div class="popup-themsp-left">
                <div class="popup-themsp-left__label">Nhập Thứ tự</div>
                <div class="popup-themsp-left__label">Nhập Tên</div>
            </div>
            <div class="popup-themsp-right">
                <div class="popup-themsp-left__input"><input class="them-thu-tu" type="text" placeholder="Thứ tự danh mục" name = "id"></div>
                <div class="popup-themsp-left__input"><input class="them-ten" type="text" placeholder="Tên danh mục" name = "tendm"></div>
            </div>
            <button type = "submit" name = "clickthemdm" class="popup-themsp__btn" onclick="alert('Thêm thành công')">Thêm</button>
            <span class="back" onclick="close_popup_themsp()">&times;</span>
        </div>
    </div>
</form>
<!-- popup sửa sp -->
<form method="POST">
    <div class="popup-suasp">
        <div class="popup-suadm__content">
            <div class="popup-themsp__title">Sửa Danh Mục</div>
            <div class="popup-themsp-left">
                <div class="popup-themsp-left__label" >Thứ tự</div>
                <div class="popup-themsp-left__label" >Tên</div>
            </div>
            <div class="popup-themsp-right" id ="">
                
                <div class="popup-themsp-left__input"><input class="them-thu-tu" type="text" placeholder="Thứ tự danh mục" name = "ids" id = "iddms" readonly></div>
                <div class="popup-themsp-left__input"><input class="them-ten" type="text" placeholder="Tên danh mục" name = "tendms" id = "tendms" ></div>
            </div>
            <button type ="submit" class="popup-suasp__btn" name = "clicksuadm" onclick="">Sửa</button>
            <span class="back" onclick="close_popup_suasp()">&times;</span>
        </div>
    </div>
</form>
<?php 
include ("themdm.php");
include ("suadm.php");
?>
