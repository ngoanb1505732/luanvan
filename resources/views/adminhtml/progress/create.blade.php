@section('title', 'Tạo Liệu Trình Mới ')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<script src="{!! asset('/js/tinymce.min.js') !!}" referrerpolicy="origin"></script>
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
            <strong>Thêm Liệu trình Mới</strong>
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
                <div class="col-lg-12 col-xs-12">
                    {!! Form::open(array('route' => 'process.save','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}

                    <div class="row">
                        <div class="col-lg-12 col-xs-12 form-group">
                            <label class="form-control-label">Tên Liệu Trình</label>
                            <input class="form-control"  placeholder="Điền tên liệu trình"   name="ten_lieu_trinh"  type="text" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-6 form-group">
                            <label class="form-control-label">Trạng Thái</label>
                            <select class="form-control" name="trang_thai">
                                <?php
                                $isFirst = true;
                                ?>
                                @foreach($trangthai as $item)
                                    @if($isFirst)
                                    <option value="{{$item}}" selected>{{$item}}</option>
                                        @else
                                            <option value="{{$item}}"> {{$item}}</option>
            <?php $isFirst = false; ?>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6  col-xs-6 form-group">
                            <label class="form-control-label">Dịch vụ</label>
                            <select class="form-control" name="dich_vu_id">
                                @foreach($dichvu as $itemDichVu)
                                    <option value="{{$itemDichVu->dich_vu_id}}">{{$itemDichVu->ten_dich_vu}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xs-6 form-group">
                            <label class="form-control-label">Thời gian thực hiện liệu trình</label>

                                <select class="form-control" name="thoi_gian">
                                    @for($i=30;$i<=120;$i=$i+30)
                                        <option value="{{$i}}">{{$i}} Phút</option>
                                        @endfor
                                </select>
                        </div>
                        <div class="col-lg-6 col-xs-6 form-group">
                            <label class="form-control-label">Giá tiền (VND)</label>
                            <input class="form-control"  placeholder="Điền giá tiền"   name="gia_tien"  type="text" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                        <img id="preview-main-img" class="preview-img"/>
                        </div>
                        <div class="col-lg-12 col-xs-12">
                            <label class="form-control-label">Ảnh đại diện</label>
                        </div>
                        <div class="col-lg-12 col-xs-12">

                          <input type="file"  accept="image/*" name="anh_dai_dien" onchange="return showImgMain(this)"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="row" id="preview-mutiple-img">
                            </div>
                        </div>
                        <div class="col-lg-12 col-xs-12">  <label class="form-control-label">Ảnh liên quan</label></div>
                        <div class="col-lg-12 col-xs-12"><input type="file" accept="image/*" name="anh_lien_quan[]" onchange="showImgMuitiple(this)" multiple/></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <label class="form-control-label">Mô tả</label>
                            <textarea name="mo_ta"></textarea>
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
        .preview-img{
            max-height: 200px;
            max-width: 200px;
        }
    </style>
    <script>
        function showImgMain(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview-main-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        function showImgMuitiple(input){
            $("#preview-mutiple-img").html("");
            for(let i=0;i<input.files.length;i++){
                var reader = new FileReader();

                reader.onload = function(e) {
                    let text ="<div class='col-lg-3 col-xs-3'>";
                    text+='<img src="'+ e.target.result+'" class="preview-img"/>';
                    text+="</div>"
                    $('#preview-mutiple-img').append(text);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    </script>
