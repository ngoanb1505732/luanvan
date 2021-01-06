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
            <li><a href="{{route("employee.updateInfo")}}">Thông tin tài khoản</a></li>
            <li class="active"><a href="#">Đổi mật khẩu</a></li>
            <li><a href="{{route("employee.front-end.schedule")}}">Lịch làm việc</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route("employee.logout")}}"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
        </ul>
    </div>
</nav>


<div class="container">
    <h2 style="text-align: center">Đổi mật khẩu</h2>
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
    <div class="row" style="text-align: center;margin-left: 25%;">
        {!! Form::open(array('route' => 'employee.updatePasswordAction','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="password_current">Mật khẩu hiện tại</label>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="password" class="form-control-custom" id="password_current"  name="password_current" minlength="6" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="password_new">Mật khẩu mới</label>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input onchange="validatePassword()" type="password" class="form-control-custom" id="password_new"  name="password_new" minlength="6" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="password_confirm">Nhập lại mật khẩu</label>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input onchange="validatePassword()" type="password" class="form-control-custom" id="password_confirm"  name="password_confirm" required minlength="6">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button type="submit" id="submit" style="" class="btn btn-primary">Cập nhật mật khẩu</button>
                </div>
            </div>
        </div>

        </form>
    </div>
</div>

</body>
<script>
    function validatePassword(){

        let password1 = document.getElementById("password_new");
        let confirm_password = document.getElementById("password_confirm");
        if(password1.value != confirm_password.value) {
            confirm_password.setCustomValidity("Mật khẩu không giống nhau");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    </script>
</html>
