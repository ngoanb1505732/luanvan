@section('title', 'Chỉnh Sửa Dịch Vụ')
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
                <a href="{{ route("service")}}" class="btn btn-success "><i class="fa fa-undo"></i>&nbsp; &nbsp; Quay lại&nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
            <strong>Chỉnh Sửa Dịch Vụ</strong>
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
                    {!! Form::open(array('route' => 'service.update','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
                    <input class="form-control" name="dich_vu_id" value="{{$dichVu->dich_vu_id}}"  type="text" hidden>
                    <input class="form-control" id="delete_anh_id" name="delete_anh_id" value=""  type="text" hidden>

                    <div class="row">
                        <div class="col-lg-6 col-xs-12 form-group">
                            <label class="form-control-label">Tên Dịch Vụ</label>
                            <input class="form-control"  placeholder="Điền tên dịch vụ"   name="ten_dich_vu" value="{{$dichVu->ten_dich_vu}}"  type="text" required>
                        </div>


                        <div class="col-lg-6  col-xs-6 form-group">
                            <label class="form-control-label">Liệu Trình</label>
                            <select class="form-control" name="lieu_trinh_id">
                                <option value=""></option>
                                @foreach($process as $itemProcess)
                                    <option value="{{$itemProcess->lieu_trinh_id}}" @if($itemProcess->lieu_trinh_id==$dichVu->lieu_trinh_id) selected @endif>{{$itemProcess->ten_lieu_trinh}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-xs-6 form-group">
                            <label class="form-control-label">Trạng Thái</label>
                            <select class="form-control" name="trang_thai">

                                @foreach($trangthai as $item)
                                    @if($item == $dichVu->trang_thai )
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
                            <select class="form-control" name="loai_dich_vu_id">
                                @foreach($loaiDichVu as $itemLoaiDichVu)
                                    @if($itemLoaiDichVu->loai_dich_vu_id == $dichVu->loai_dich_vu_id )
                                    <option value="{{$itemLoaiDichVu->loai_dich_vu_id}}" selected>{{$itemLoaiDichVu->ten_loai_dich_vu}}</option>
                                    @else
                                        <option value="{{$itemLoaiDichVu->loai_dich_vu_id}}">{{$itemLoaiDichVu->ten_loai_dich_vu}}</option>
                                    @endif
                                        @endforeach
                            </select>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xs-6 form-group">
                            <label class="form-control-label">Thời gian thực hiện liệu trình</label>

                            <select class="form-control" name="thoi_gian">
                                @for($i=30;$i<=120;$i=$i+30)
                                    @if($i == $dichVu->thoi_gian)
                                    <option value="{{$i}}" selected>{{$i}} Phút</option>
                                    @else
                                        <option value="{{$i}}" >{{$i}} Phút</option>
                                    @endif
                                        @endfor
                            </select>
                        </div>
                        <div class="col-lg-6 col-xs-6 form-group">
                            <label class="form-control-label">Giá tiền (VND)</label>
                            <input class="form-control"  placeholder="Điền giá tiền" value="{{$dichVu->gia_tien}}"   name="gia_tien"  type="text" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <img id="preview-main-img" src="{{url("/")."/".$dichVu->anh_dai_dien}}" class="preview-img"/>
                        </div>
                        <div class="col-lg-12 col-xs-12">
                            <label class="form-control-label">Ảnh đại diện</label>
                        </div>
                        <div class="col-lg-12 col-xs-12">

                            <input type="file" accept="image/*" name="anh_dai_dien" onchange="return showImgMain(this)"/>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12 col-xs-12">
                            <div class="row">
                                 @foreach($dichVu->hinhAnh as $item)
                                    <div class="col-lg-3 col-xs-3" style="text-align: center" id="{{$item->hinh_anh_id}}">
                                        <img  src="{{url("/")."/".$item->duong_dan}}" class="preview-img"/>
                                        <div><button type="button" onclick="removeImage('{{$item->hinh_anh_id}}')">Xoá</button></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

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
                            <textarea name="mo_ta">
                                {!! $dichVu->mo_ta !!}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150" >Xác nhận</button>
                        <button type="reset" onclick="return location.reload();" class="btn btn-warning width-150" >Hoàn tác</button>
                        <a href="{{ route("service")}}"  class="btn btn-default">Huỷ</a>
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
        function removeImage(id){
         let value =   document.getElementById("delete_anh_id").value;
         value = value ==""? id:value+","+id;
            document.getElementById("delete_anh_id").value = value;
            document.getElementById(id).hidden = true;
        }
    </script>
