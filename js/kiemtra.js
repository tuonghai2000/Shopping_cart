
var aaa;
$(document).ready(function() {
    //   $(".atc").click(function(){
    //     $(this).addClass('active');
    // });
        $("#signup").on('click', function(e){
              if(ktform() == false)
                e.preventDefault();
            });
  });
        
          function ktform()
          {
            var user=document.getElementById("user");
            var pass=document.getElementById("pass");
            var repass=document.getElementById("repass");
            var gmail=document.getElementById("gmail");
            var phone=document.getElementById("phone");
            var diachi=document.getElementById("diachi");
            var fullname=document.getElementById("fullname");
            var checksdt = /[0][1-9]{9}$/;
            var checkuser = /[a-z0-9]{6}/
            var checkpass = /[a-z0-9]{6}/
            var checkmail=/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/i;
              if(user.value==""){
                document.getElementById("loiuser").innerHTML = "</br>Vui lòng nhập tên đăng nhập!!!";
                user.focus();
                return false;
              }
              else if(checkuser.test(user.value)==false){
                document.getElementById("loiuser").innerHTML="</br>Tên đăng nhập không hợp lệ hoặc phải trên 6 ký tự!!";
                user.focus();
                return false;
                }
              else {
                document.getElementById("loiuser").style.display = 'none';
              }
            
              if(pass.value==""){ 
                document.getElementById("loipass").innerHTML = "</br>Vui lòng nhập mật khẩu!!!";
                pass.focus();
                return false;
              }
              else if(checkpass.test(pass.value)==false){
                document.getElementById("loipass").innerHTML="</br>Mật khẩu không hợp lệ hoặc phải có trên 6 ký tự!!!";
                pass.focus();
                return false;
                }
              else {
                document.getElementById("loipass").style.display = 'none';
              }
              if(repass.value==""){ 
                document.getElementById("loirepass").innerHTML = "</br>Vui lòng nhập lại mật khẩu!!!";
                repass.focus();
                return false;
              }
              else if(pass.value!=repass.value){
                document.getElementById("loirepass").innerHTML = "</br>Mật khẩu nhập lại không khớp!!!";
                repass.focus();
                return false;
              }
              else{
                document.getElementById("loirepass").style.display = 'none';
              }
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
              if(diachi.value==""){ 
              document.getElementById("loidiachi").innerHTML = "</br>Vui lòng nhập lại địa chỉ!!!";
              diachi.focus();
              return false;
              }
              else {
              document.getElementById("loidiachi").style.display = 'none';
              }
              return true;
          }
function kiemtrauser(){
  var username  = user.value;
      $.post("modules/content/xuly/xulydangky.php",{user:username},function(data){
          $("#loiuser").html(data);
          user.focus();
      });
  //$("#loiuser").html("thang");
}
function show(){
                var c = document.getElementById("check");
                var x = document.getElementById("mkc");
                var n = document.getElementById("mkm");
                var s = document.getElementById("mknl");
                  if (c.checked == true) {
                    x.style.display =  "block";
                    n.style.display = "block"
                    s.style.display = "block"
                  } else {
                    x.style.display = "none";
                    n.style.display = "none";
                    s.style.display = "none";
                  }
            }