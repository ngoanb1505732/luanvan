@section('title', 'Cập nhật thông tin loại dịch vụ')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea',
        height: 350

});</script>
<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ route("typeService")}}" class="btn btn-success "><i class="fa fa-undo"></i>&nbsp; &nbsp; Quay lại&nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
            <strong>Cập Nhật Thông Tin Loại Dịch Vụ </strong>
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
                    {!! Form::open(array('route' => 'typeService.update','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
                    <input value="{{$loaidichvu->loai_dich_vu_id}}" class="form-control"    name="loai_dich_vu_id"  type="text" hidden>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-control-label">Tên Dịch Vụ</label>
                            <input class="form-control"  placeholder="Điền tên dịch vụ" value="{{$loaidichvu->ten_loai_dich_vu}}"   name="ten_loai_dich_vu"  type="text" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-control-label">Diễn giải</label>
                            <textarea name="dien_giai">{{$loaidichvu->dien_giai}}</textarea>
                        </div>
                    </div>
                       <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150" >Xác nhận</button>
                        <button type="reset" class="btn btn-warning width-150" >Hoàn tác</button>
                        <a href="{{ route("typeService")}}"  class="btn btn-default">Huỷ</a>
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
    <style>
        .tox-notifications-container {
            display: none;
        }
    </style>

