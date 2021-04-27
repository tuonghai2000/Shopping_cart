function popup_themsp() {
    document.getElementsByClassName('popup-themsp')[0].style.display = 'block';
}
function popup_themnv() {
    document.getElementsByClassName('popup-themsp')[0].style.display = 'block';
     $.ajax({
        url : 'modules/content/manvtieptheo.php',
        type : 'get',
        dataType : 'text',
        success : function (result){
            var getdata = $.parseJSON(result);
            $("#idnvtieptheo").val(getdata.idnvsp);
            }       
            });
}

function close_popup_themsp() {
    document.getElementsByClassName('popup-themsp')[0].style.display = 'none';
    try {
        document.getElementsByClassName('popup-themsp')[1].style.display = 'none';
        console.log("ABCD");
    } catch (e) {
        console.log("ABCD");
    }
}
function popup_suasp(id) {
    //Dòng hiện bảng popup
    document.getElementsByClassName('popup-suasp')[0].style.display = 'block';
    //Đổ dữ liệu vào
    $.ajax({
        url : 'modules/content/dodulieu.php',
        type : 'get',
        data: {
            id: id
        },
        dataType : 'text',
        success : function (result){
            var getdata = $.parseJSON(result);
            $("#idsp").val(getdata.idsp);
            $("#tensp").val(getdata.ten);
            $("#loaisp").val(getdata.loai);
            $("#giasp").val(getdata.gia);
            $("#mota").val(getdata.mota);
                        }
                    });        
}
function suacanhan(id) {
    //Dòng hiện bảng popup
    document.getElementsByClassName('popup-suasp')[0].style.display = 'block';
    //Đổ dữ liệu vào
    $.ajax({
        url : 'modules/content/dodulieucanhan.php',
        type : 'get',
        data: {
            id: id
        },
        dataType : 'text',
        success : function (result){
            var getdata = $.parseJSON(result);
            $("#idnvs").val(getdata.idnvs);
            $("#tennvs").val(getdata.tennvs);
            $("#sdts").val(getdata.sdts);
            $("#diachis").val(getdata.diachis);
            $("#ngaysinhs").val(getdata.ngaysinhs);
            $("#gioitinhs").val(getdata.gioitinhs );
                        }
                    });        
}
function doipass(id) {
    document.getElementsByClassName('popup-suasp')[1].style.display = 'block';
    $.ajax({
        url : 'modules/content/dodulieupass.php',
        type : 'get',
        data: {
            id: id
        },
        dataType : 'text',
        success : function (result){
            var getdata = $.parseJSON(result);
            $("#idnvsp").val(getdata.idnvsp);
                    }       
            });

}


function close_popup_suasp() {
    document.getElementsByClassName('popup-suasp')[0].style.display = 'none';
    try {
        document.getElementsByClassName('popup-suasp')[1].style.display = 'none';
    } catch (e) {
        console.log("Đang ở trang Quản lý Đơn Hàng");
    }
}
function popup_cthd (id){
    document.getElementsByClassName('popup-cthd')[0].style.display = 'block';

    $.ajax({
        url : 'modules/content/chitiethoadon.php',
        type : 'get',
        data: {
            id: id
        },
        dataType : 'text',
        success : function (result){
            $('#dulieuchitiet').html(result);
        }
    }); 
}
function close_popup_cthd (){
    document.getElementsByClassName('popup-cthd')[0].style.display = 'none';
}
