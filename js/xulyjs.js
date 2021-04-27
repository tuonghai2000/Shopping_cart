// JavaScript Document
var tien;

$(window).load(function() {
		    $('#slider').nivoSlider(); 
}); 
function themgiohang(id){
		$.get("modules/content/xuly/addcart.php",{id:id},function(data){
			swal({
				type: 'success',
				title: 'Bạn đã thêm vào giỏ hàng thành công',
				showConfirmButton: false,
				confirmButtonColor: '#3085d6'
			});
			//location.reload();
		 	$(".discart").html(data);
		});
    
}
// function timkiem(){
// 	var tenSP = $("#tennc").val();
// 	var idm = $("#giatu").val();
//   var idmx = $("#giaden").val();
// 	var idloai = $("#loai").val();
// 	$.get("modules/content/timkiem.php",{key:tenSP,idmin:idm,idmx:idmax,idL:idloai},function(data){
//             $("#maincontent").html(data);
//         });
// }
function timkiem(){
  var tenSP = $("#tennc").val();
  var idm = $("#giatu").val();
  var idmx = $("#giaden").val();
  var idloai = $("#loai").val();
    $.ajax({
            url: 'modules/content/timkiem.php',
            type: 'get',
            data: {
              key: tenSP,
              idmin: idm,
              idmax: idmx,
              idL: idloai
            },
            dataType: 'text',
            success: function(data) {
              $("#maincontent").html(data);
            },
      });
}
function updateitem(id){
            sl = $("#sl"+id).val();
            $.get( "index.php?xem=cart&id="+id+"&sl="+sl,function(data) {
              $("#slt").html(sl);
            });
            swal({
                  type: 'success',
                  title: 'Bạn đã thêm vào giỏ hàng thành công',
                  showConfirmButton: false,
                  confirmButtonColor: '#3085d6'
            });
          }
function removeItem(id){
    var thongbao = confirm("Bạn có muốn xóa sản phẩm này");
        if(thongbao == true){
          $.get("index.php?xem=cart&id="+id+"&action=del",function(data){
              location.reload();
          });
      }
              return false;
}
function ktthanhtoan()
          {
            var gmail=document.getElementById("gmail");
            var phone=document.getElementById("phone");
            var diachi=document.getElementById("diachi");
            var fullname=document.getElementById("fullname");
            var checksdt = /[0][1-9]{9}$/;
            var checkuser = /[a-z0-9]{8}/
            var checkpass = /[a-z0-9]{8}/
            var checkmail=/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/i;
              if(fullname.value=="")
              {
                document.getElementById("loifullname").innerHTML="</br>Vui lòng nhập họ tên!!!";
                fullname.focus();
                return false;
              }
              else {
                document.getElementById("loifullname").style.display = 'none';
              }
              if(gmail.value==""){  
                document.getElementById("loigmail").innerHTML = "</br>Vui lòng nhập lại gmail!!!";
                gmail.focus();
                return false;
              }
              else if(checkmail.test(gmail.value)==false){
                document.getElementById("loigmail").innerHTML = "</br>Gmail không hợp lệ!!!";
                gmail.focus();
                return false;
              }
              else {
                document.getElementById("loigmail").style.display = 'none';
              }
              if(phone.value==""){  
                document.getElementById("loiphone").innerHTML = "</br>Vui lòng nhập lại số điện thoại!!!";
                phone.focus();
                return false;
              }
              
              else if(checksdt.test(phone.value)==false){
                document.getElementById("loiphone").innerHTML = "</br>Số điện thoại không hợp lệ!!!";
                phone.focus();
                return false;
              }
              else {
                document.getElementById("loiphone").style.display = 'none';
              }
              if(diachi.value == ""){ 
              document.getElementById("loidiachi").innerHTML = "</br>Vui lòng nhập lại địa chỉ!!!";
              diachi.focus();
              return false;
              }
              else {
              document.getElementById("loidiachi").style.display = 'none';
              }
              return true;
          }

  function phuongthuc(e){
      var a = $(e).val();
      tien = a;
      // var ptthanhtoan = document.getElementsByName('ptthanhtoan').value;
      alert(a);
  }
  document.getElementById("payment").addEventListener('click', function(e){
      if(ktthanhtoan() == false){
        e.preventDefault();
    	}
      else if(ktthanhtoan() == true){
        //var ptthanhtoan = document.getElementsByName('ptthanhtoan').value;
        var value;
        $(".ptthanhtoan:checked").each(function() {
        value = $(this).val();
        });
        console.log(value);
        $.ajax({
            url: 'modules/content/xuly/xulythanhtoan.php',
            type: 'post',
            data: $('#formthanhtoan').serialize(),
            dataType: 'text',
            success: function(data) {
              $('#return').html(data);
            },
          });
      }
  });
  function checktk(){
         $.ajax({
            url: 'modules/content/xuly/xulydangnhap.php',
            type: 'POST',
            data: $('#boderform').serialize(),
            dataType: "text",
            success: function(data) {
              $("#loi").html(data);
              $("#lois").html(data);
            },
          });
  }
  function cong(id){
    var x = $("#sl"+id).val();
    x = parseInt(x)+ 1;
    $("#sl"+id).val(x);
    ajaxcart(id,x);
  }
   function tru(id){
    var x = $("#sl"+id).val();
    if(x > 1){
      x = parseInt(x) - 1;
    }
    else{
      x = 1;
    }
    $("#sl"+id).val(x);
    ajaxcart(id,x);
  }
  function ajaxcart(ma,soluong){
      $.ajax({
            url: 'modules/content/xuly/xulysoluong.php',
            type: 'get',
            data: {
              masp : ma,
              soluong : soluong
            },
            dataType: "text",
            success: function(data) {
            var getdata = $.parseJSON(data);
              $("#"+ma).html(numberFormat(getdata.thanhtien));   
              $("#slt").html(getdata.soluong);
              $("#sltt").html(getdata.soluong);  
              $("#sum").html(numberFormat(getdata.tongtien));
              $("#sumt").html(numberFormat(getdata.tongtien));       
            },
        });
  }
  function numberFormat(nStr){
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1))
      x1 = x1.replace(rgx, '$1' + '.' + '$2');
      var x3 = "VNĐ";
    return x1 + x2 + " " + x3;
}
function checkmkc(){
    var x = $("#pass").val();
    $.ajax({
            url: 'modules/content/xuly/xulymkc.php',
            type: 'POST',
            data: {
              pass: x
            },
            dataType: "text",
            success: function(data) {
               $("#lois").html(data);       
            },
        });
}
function checkcdmk(){
  var mkm = $("#passm").val();
  var checkpass = /[a-z0-9]{6}/;
  if(checkpass.test(mkm)==false){
      document.getElementById("loim").innerHTML="</br>Mật khẩu không hợp lệ hoặc phải có trên 6 ký tự!!!";              
      return false;
  }
  else
    document.getElementById("loim").innerHTML = "";
    return true;
}
function checkmkm(){
  var mkm = $("#passm").val();
  var mknl = $("#passnl").val();
  if(mknl != mkm){
    document.getElementById("loinl").innerHTML = "</br>Mật khẩu không khớp!!!";
    return false;
  }
  else{
    document.getElementById("loinl").innerHTML = "";
    return true;
  }
}
function testsuatt(){
  if(ktthanhtoan() == true){
    alert("Cập nhật thành công!!!");
  }
  else{
    alert("loi");
  }
}
function ajaxphantrang(idsp,trang){
      $.ajax({
            url: 'modules/content/loaisanpham.php',
            type: 'get',
            data: {
              id : idsp,
              page : trang
            },
            dataType: "text",
            success: function(data) {
              $("#maincontent").html(data);
            },
        });
  }
function kiemtraso(){
    var x = $("#giatu").val();
    if(isNaN(x)){
      $("#giatu").val("");
    }
    else{
      $("#giatu").val(x);
    }
}
function kiemtrasoden(){
    var x = $("#giaden").val();
    if(isNaN(x)){
      $("#giaden").val("");
    }
    else{
      $("#giaden").val(x);
    }
}
function kiemtraslmua(id){
    var x = $("#sl"+id).val();
    if(x < 1){
      $("#sl"+id).val(1);
    }
    else{
      $("#sl"+id).val(x);
    }
}
function kiemtraslcart(id){
    var x = $("#sl"+id).val();
    if(isNaN(x)){
      $("#sl"+id).val(1);
    }
    else{
      $("#sl"+id).val(x);
    }
}