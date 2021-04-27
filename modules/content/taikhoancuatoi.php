  <style>
  .avatar{
	  margin-left:15%;;
	  }
	.vertical-menu a{
		
		}
  </style>
  <div class="col-xs-12 col-sm-8 col-md-12">
      <div class="container-fluid">
        <div class="col-xs-12 col-sm-8 col-md-3">
          <div class="vertical-menu text-center" style="margin-top: 8%;">
            <div>
              <p><img src="images/banerct.jpg" alt="Avatar" class="avatar"></p>
              <p style="color: black;">Tài khoản của :	
			  <?php if(isset($_SESSION['user']))
			  { echo  $_SESSION['user']['hoten'];}
			  ?></p>
            </div>
            <ul class="dropmenu1">
            	<li class="limenu1">
            		<a href="index.php?xem=taikhoancuatoi&id=hscuatoi" class="atc">
            			<i class="fa fa-user"></i>
            			<span>Tài khoản của tôi</span>
            		</a>
            	</li>
            	<li class="limenu1">
            		<a href="index.php?xem=taikhoancuatoi&id=dhcuatoi" class="atc">
						<i class="fa fa-archive"></i>
            			<span>Quản lý đơn hàng</span>
            		</a>
            	</li>
            </ul>
        </div>
  </div>
  <?php
 	if(isset($_GET['id']))
	{
		$tam = $_GET['id'];
	}
	else {
		$tam = "";
	}			
	switch ($tam) {
			
		case 'hscuatoi': include('hosocuatoi.php');break;
		case 'dhcuatoi': include('donhangcuatoi.php');break;
		case 'chitietdonhang': include('chitietdonhang.php');break;
	}	
  ?>