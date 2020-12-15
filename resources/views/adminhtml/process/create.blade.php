@section('title', 'Tạo Liệu Trình Mới ')
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
                <a href="{{ route("process")}}" class="btn btn-success "><i class="fa fa-undo"></i>&nbsp; &nbsp; Quay lại&nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
            <strong>Thêm Liệu Trình mới</strong>
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
                    {!! Form::open(array('route' => 'process.save','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-control-label">Tên Liệu Trình</label>
                            <input class="form-control"  placeholder="Điền tên liệu trình"   name="ten_lieu_trinh"  type="text" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-control-label">Diễn giải</label>
                            <textarea name="dien_giai"></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                                <button type="submit" class="btn btn-primary width-150" >Xác nhận</button>
                                <button type="reset" class="btn btn-warning width-150" >Hoàn tác</button>
                                <a href="{{ route("process")}}"  class="btn btn-default">Huỷ</a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </section>
@include('components/footer')


    <style>
        .tox-notifications-container {
            display: none;
        }
        .tox .tox-tinymce{
            height: 350px;
        }
    </style>
