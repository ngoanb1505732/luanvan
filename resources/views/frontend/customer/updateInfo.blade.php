@extends("frontend.template.index")
@section("title")
Cập nhật thông tin tài khoản
@endsection
@section("main")
    <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="ps-post--detail">
                    <div class="ps-post__header">
                        <h3 class="ps-post__title">Cập nhật thông tin tài khoản</h3>
                    </div>
                    <div class="ps-post__content">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert" id="id">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $message }} !</strong>
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
                    </div>
                </div>
                <div>
                </div>

                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Thông tin tài khoản</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route("customer.bookingHistory","false")}}">Lịch hẹn</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Lịch sử</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-8 col-md-12">
{{--                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link active tab-title" id="pills-info-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Thay Đổi Thông Tin</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link tab-title" id="pills-password-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Thay Đổi Mật Khẩu</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="tab-content" id="pills-tabContent">--}}
{{--                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-info-tab">--}}



{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-password-tab">44444</div>--}}
{{--                                </div>--}}

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link tab-title" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Thay Đổi Thông Tin</a>

                                        <a class="nav-item nav-link  tab-title" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Thay Đổi Mật Khẩu</a>

                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                        {!! Form::open(array('route' => 'customer.updateInfoAction','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            <label for="dia_chi">Họ tên</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <input type="text" class="form-control-custom" id="ho_ten"
                                                                   placeholder="Họ tên"
                                                                   name="ho_ten" value="{{$customer->ho_ten}}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            <label for="dia_chi">Địa chỉ</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <input type="text" class="form-control-custom" id="dia_chi"
                                                                   placeholder="Địa chỉ"
                                                                   name="dia_chi" value="{{$customer->dia_chi}}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            <label for="dia_chi">Số điện thoại</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <input type="text" class="form-control-custom" id="sdt"
                                                                   placeholder="Địa chỉ"
                                                                   name="sdt" value="{{$customer->sdt}}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            <label for="dia_chi">Ngày sinh</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <input type="date" class="form-control" id="ngay_sinh" value="{{$customer->ngay_sinh}}" name="ngay_sinh" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" id="submit" style="margin-left: 50%" class="btn btn-primary">Cập nhật thông tin</button>

                                        </form>
                                    </div>
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        {!! Form::open(array('route' => 'customer.updatePassword','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                        <label for="password_current">Mật khẩu hiện tại</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                        <input type="password" class="form-control-custom" id="password_current"  name="password_current" minlength="6" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                        <label for="password_new">Mật khẩu mới</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                        <input onchange="validatePassword()" type="password" class="form-control-custom" id="password_new"  name="password_new" minlength="6" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                        <label for="password_confirm">Nhập lại mật khẩu</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                        <input onchange="validatePassword()" type="password" class="form-control-custom" id="password_confirm"  name="password_confirm" required minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" id="submit" style="margin-left: 50%" class="btn btn-primary">Cập nhật mật khẩu</button>

                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection
    </body>
    </html>
    <style>
        .ps-post__title{
            text-align: center;
        }
        .nav-item{
            font-size: 15px;
        }
        .active{
            font-weight: bold;
            color: #2AC37D;
        }
        .label{
            font-size: 17px;
        }
        .tab-title{
        margin-left: 20px;
        }
        .form-group{
            color: black;
        }
        .form-control-custom{
            width: 100%;
        }
        form{
            margin-top: 37px;
        }
    </style>
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


