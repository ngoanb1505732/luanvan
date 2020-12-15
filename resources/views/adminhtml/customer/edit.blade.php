@section('title', 'Cập nhật thông tin khách hàng')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ route("customer")}}" class="btn btn-success "><i class="fa fa-undo"></i>&nbsp; &nbsp; Quay lại&nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
            <strong>Cập Nhật Thông Tin Khách Hàng</strong>
        </span>
        </div>
        <div class="card-body">
            <div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-12">
                    {!! Form::open(array('route' => 'customer.update','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
                    <input value="{{$khachhang->khach_hang_id}}" class="form-control"    name="khach_hang_id"  type="text" hidden>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label">Username</label>
                            <input value="{{$khachhang->username}}" class="form-control"  placeholder="Điền username"   name="username" required  type="text" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">Password</label>
                            <input value="{{$khachhang->password}}" class="form-control"  placeholder="Điền password" minlength="6"   name="password"  required type="password" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label">Họ và tên</label>
                            <input value="{{$khachhang->ho_ten}}" class="form-control"  placeholder="Điền họ tên"   name="ho_ten" required  type="text" require>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">Địa chỉ</label>
                            <input value="{{$khachhang->dia_chi}}" class="form-control"  placeholder="Điền địa chỉ"   name="dia_chi" required  type="text" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label">Ngày sinh</label>
                            <input class="form-control" value="{{$khachhang->ngay_sinh}}"  placeholder="điền ngày sinh"   name="ngay_sinh" required type="date" >
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">Số điện thoại</label>
                            <input class="form-control" value="{{$khachhang->sdt}}"  placeholder="Điền số điện thoại"   name="sdt"  required type="text">
                        </div>
                    </div>
                       <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150" >Xác nhận</button>
                        <button type="reset" class="btn btn-warning width-150" >Hoàn tác</button>
                        <a href="{{ route("customer")}}"  class="btn btn-default">Huỷ</a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </section>
    <!-- END: ecommerce/product-edit -->
    <!-- END: ecommerce/products-list -->

    <!-- START: page scripts -->

    <!-- include summernote css/js-->



    <script>
        $(function() {

            // Form Validation
            $('#form-validation').validate({
                submit: {
                    settings: {
                        inputContainer: '.form-group',
                        errorListClass: 'form-control-error',
                        errorClass: 'has-danger'
                    }
                }
            });


        });
    </script>
    <style>
        .img-avatar{
            width: 300px;
            height: 300px;
        }

    </style>
    <!-- END: page scripts -->
@include('components/footer')

