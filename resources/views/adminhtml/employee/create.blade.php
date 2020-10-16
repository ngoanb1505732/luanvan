@section('title', 'Tạo nhân viên mới')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ route("employee")}}" class="btn btn-success "><i class="fa fa-undo"></i>&nbsp; &nbsp; Quay lại&nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
            <strong>Add Event</strong>
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
                    {!! Form::open(array('route' => 'employee.save','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label">Họ và tên</label>
                            <input class="form-control"  placeholder="Điền họ tên"   name="ho_ten"  type="text" >
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">Địa chỉ</label>
                            <input class="form-control"  placeholder="Điền địa chỉ"   name="dia_chi"  type="text" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-control-label">Ngày sinh</label>
                            <input class="form-control"  placeholder="điền ngày sinh"   name="ngay_sinh"  type="text" >
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">Số điện thoại</label>
                            <input class="form-control"  placeholder="Điền số điện thoại"   name="dien_thoai"  type="text" >
                        </div>
                    </div>


                    <input type="hidden" name="product_id" value="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <img src="" id="show-img"/>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Ảnh<span style="color:red; font-weight:900; font-size:20px;">*</span></label><br><br>
                                <input onchange="return showImg(this)" name="anh" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150" >Submit</button>
                        <button type="reset" class="btn btn-warning width-150" >Reset</button>
                        <a href="#"  class="btn btn-default">Cancel</a>
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
        function showImg(el){
            console.log("Phuc");
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
    </script>
    <!-- END: page scripts -->
@include('components/footer')
