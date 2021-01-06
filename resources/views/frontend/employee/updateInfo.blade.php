<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/bootstrap/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 6px 6px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 200px; /* Same as the width of the sidenav */
        }
        .title{
            font-size: 18px;
            font-weight: bold;
        }
        .row{
            margin: 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        .img-avatar{
            width: 250px;
            height: 300px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Duyên Spa</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Thông tin tài khoản</a></li>
            <li><a href="{{route("employee.updatePassword")}}">Đổi mật khẩu</a></li>
            <li><a href="{{route("employee.front-end.schedule")}}">Lịch làm việc</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route("employee.logout")}}"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
        </ul>
    </div>
</nav>


    <div class="container">
        <h2 style="text-align: center">Thông Tin Tài Khoản</h2>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Đã xảy ra lỗi </strong> {{ $message }} !
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ $message }}!</strong>
            </div>
        @endif
        <div class="row">
            {!! Form::open(array('route' => 'employee.updateInfoAction','method'=>'POST',"autocomplete"=>"off", 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-control-label">Username</label>
                    <input value="{{$nhanvien->username}}" class="form-control"  placeholder="Điền username"   name="username" required  type="text" readonly>
                </div>

                <div class="col-lg-6">
                    <label class="form-control-label">Họ và tên</label>
                    <input value="{{$nhanvien->ho_ten}}" class="form-control"  placeholder="Điền họ tên"   name="ho_ten" required  type="text" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-control-label">Ngày sinh</label>
                    <input class="form-control" value="{{$nhanvien->ngay_sinh}}"  placeholder="điền ngày sinh"   name="ngay_sinh" required type="date" >
                </div>
                <div class="col-lg-6">
                    <label class="form-control-label">Số điện thoại</label>
                    <input class="form-control" value="{{$nhanvien->sdt}}"  placeholder="Điền số điện thoại"   name="sdt"  required type="text">
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <label class="form-control-label">Địa chỉ</label>
                    <input value="{{$nhanvien->dia_chi}}" class="form-control"  placeholder="Điền địa chỉ"   name="dia_chi" required  type="text" >
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <img src="" id="show-img"/>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Ảnh<span style="color:red; font-weight:900; font-size:20px;">*</span></label><br><br>

                        @if (isset ($nhanvien["anh"]))
                            <img id="avartar" src="{{url("/")."/".$nhanvien["anh"]}}" class="img-avatar"/>
                        @else
                            <img id="avartar" src="" class="img-avatar"/>

                        @endif
                        <input onchange="return showImg(this)" name="anh" type="file">
                    </div>
                </div>
            </div>
            <div class="form-actions" style="    text-align: center;">
                <button type="submit" class="btn btn-primary width-150" >Cập nhật</button>
                <button type="reset" class="btn btn-warning width-150" >Hoàn tác</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script>
        function showImg(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById("avartar").setAttribute("src",e.target.result);
                //    $('#avartar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    </script>


</body>
</html>
