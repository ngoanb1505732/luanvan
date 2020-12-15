@section('title', 'Tạo khách hàng mới')
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
            <strong>Thêm Khách Hàng Mới</strong>
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
                    {!! Form::open(array('route' => 'customer.save','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label">Username</label>
                            <input class="form-control"  placeholder="Điền username" onchange="validateUsername()"   name="username" minlength="5" type="text" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">Password</label>
                            <input class="form-control"  placeholder="Điền password"   name="password" minlength="6"  type="password" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label">Họ và tên</label>
                            <input class="form-control"  placeholder="Điền họ tên"   name="ho_ten"  type="text" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">Địa chỉ</label>
                            <input class="form-control"  placeholder="Điền địa chỉ"   name="dia_chi"  type="text" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label">Ngày sinh</label>
                            <input class="form-control"  placeholder="điền ngày sinh"   name="ngay_sinh"  type="date" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">Số điện thoại</label>
                            <input class="form-control"  placeholder="Điền số điện thoại"   name="sdt"  type="text" required>
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
        function showImg(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#avartar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    </script>

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


        function validateUsername(){
            let username = document.getElementById("username");
            $.ajax({url: "http://localhost/luanvan/public/api",
                data:{"action":"checkCustomerExist","username":username.value},
                method:"POST",
                success: function(result){
                    if(result == "true"){
                        username.setCustomValidity("Username đã tồn tại");
                    }
                    else {
                        username.setCustomValidity("");
                    }
                }
            });
        }
    </script>
    <style>
        .img-avatar{
            width: 300px;
            height: 300px;
        }

    </style>
    <!-- END: page scripts -->
@include('components/footer')
