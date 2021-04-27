<?php
$conn = mysqli_connect("localhost","root","","shopbandienthoai") or die("loi");
mysqli_set_charset($conn, 'UTF8');
$id = $_GET['id'];
$tongtien = 0;
    //
    //echo '<script>alert("'.$id.'")</script>';
if($id == 2)
{
    $sql = "SELECT * FROM donhang";
    $run = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($run);
    
    $tinhtrang;
    $i = 0; 
    if($num > 0)
    {
        while ($row = mysqli_fetch_array($run)) {
            if($i <= $num){
                if($row['trangthai'] == 1)
                {
                   $tinhtrang = "Đã xử lý";
                   echo '<tr onclick = "popup_cthd('.$row['idHD'].')">
                   <td>'.$row['idHD'].'</td>
                   <td>'.$row['hoten_user'].'</td>
                   <td>'.$row['Gmail_user'].'</td>
                   <td>'.$row['phone'].'</td>
                   <td>'.$row['Ngaytao'].'</td>
                   <td>'.number_format($row['Tongtien'],0,',','.').' VNĐ</td>
                   <td>'.$tinhtrang.'</td>                                             
                   <td>Hoàn thành</td>
                   </tr>'; 
                   $tongtien += $row['Tongtien'];
               }
               
               else 
               {
                   $tinhtrang = "Chưa xử lý";
                   echo '<tr onclick = "popup_cthd('.$row['idHD'].')">
                   <td>'.$row['idHD'].'</td>
                   <td>'.$row['hoten_user'].'</td>
                   <td>'.$row['Gmail_user'].'</td>
                   <td>'.$row['phone'].'</td>
                   <td>'.$row['Ngaytao'].'</td>
                   <td>'.number_format($row['Tongtien'],0,',','.').' VNĐ</td>
                   <td>'.$tinhtrang.'</td>                                             
                   <td>
                   <button class="xoa_sp" type="button" id = "'.$row['idHD'].'" onclick = xuly('.$row['idHD'].')>Xử lý</button>
                   </td>
                   </tr>';  
                   $tongtien += $row['Tongtien']; 
                   
               }
               
               
           }
           $i++;
       }
   }
   echo '<tr> 
        <td style = "color:red;">Tổng tiền</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style = "color:red;">'.number_format($tongtien,0,',','.').' VNĐ</td>
        <td></td>
        <td></td>
        
      </tr>';
}
if($id == 1)
{
    $sql = "SELECT * FROM donhang WHERE trangthai = $id";
    $run = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($run);
    $tinhtrang = "Đã xử lý";
    $i = 0; 
    if($num > 0)
    {
        while ($row = mysqli_fetch_array($run)) {
            if($i <= $num){
                echo '<tr onclick = "popup_cthd('.$row['idHD'].')">
                <td>'.$row['idHD'].'</td>
                <td>'.$row['hoten_user'].'</td>
                <td>'.$row['Gmail_user'].'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['Ngaytao'].'</td>
                <td>'.number_format($row['Tongtien'],0,',','.').' VNĐ</td>
                <td>'.$tinhtrang.'</td>                                             
                <td>
                Hoàn thành
                </td>
                </tr>';
                $tongtien += $row['Tongtien'];                                                  
            }
            $i++;
        }
    }
    echo '<tr> 
        <td style = "color:red;">Tổng tiền</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style = "color:red;">'.number_format($tongtien,0,',','.').' VNĐ</td>
        <td></td>
        <td></td>
        
      </tr>';
}
if($id==0)
{
    $sql = "SELECT * FROM donhang WHERE trangthai = $id";
    $run = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($run);
    $tinhtrang = "Chưa xử lý";
    $i = 0; 
    if($num > 0)
    {
        while ($row = mysqli_fetch_array($run)) {
            if($i <= $num){
                echo '<tr onclick = "popup_cthd('.$row['idHD'].')">
                <td>'.$row['idHD'].'</td>
                <td>'.$row['hoten_user'].'</td>
                <td>'.$row['Gmail_user'].'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['Ngaytao'].'</td>
                <td>'.number_format($row['Tongtien'],0,',','.').' VNĐ</td>
                <td>'.$tinhtrang.'</td>                                             
                <td>
                <button class="xoa_sp" type="button" id = "'.$row['idHD'].'" onclick = xuly('.$row['idHD'].')>Xử lý</button>
                </td>
                </tr>';    
                $tongtien += $row['Tongtien'];                                              
            }
            $i++;
        }
    }
    echo '<tr> 
        <td style = "color:red;">Tổng tiền</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style = "color:red;">'.number_format($tongtien,0,',','.').' VNĐ</td>
        <td></td>
        <td></td>
        
      </tr>';
}

?>