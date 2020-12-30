@section('title', 'Chi tiêt đánh giá')
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
                <a href="{{ route("admin.rate")}}" class="btn btn-success "><i class="fa fa-undo"></i>&nbsp; &nbsp;
                    Quay lại&nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
            <strong>Chi tiết lịch hẹn</strong>
        </span>
        </div>
        <div class="card-body">
            <div class="row">
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
                <div style="text-align: center; margin-top: 25px; margin-bottom: 25px" class="col-lg-12 col-xs-12">
                    <a href="{{route("admin.rate.delete",$danhGia->danh_gia_id)}}">
                        <button type="button" class="btn btn-danger">Xoá đánh giá</button>
                    </a>
                    <a href="{{route("admin.rate.complete",$danhGia->danh_gia_id)}}">
                        <button type="button" class="btn btn-primary">Xác nhận đánh giá</button>
                    </a>
                    <a href="{{route("admin.rate.cancel",$danhGia->danh_gia_id)}}">
                        <button type="button" class="btn btn-success">Huỷ đánh giá</button>
                    </a>
                </div>

                <div class="col-lg-6 col-xs-12" style="border-right: 2px solid gray;">
                    <h4 style="text-align: center">Thông tin đánh giá</h4>
                    <table class="table table-hover nowrap" id="example1" width="100%">
                        <thead class="thead-default">
                        </thead>
                        <tbody>
                        <tr>
                            <th>Khách hàng</th>
                            <th>{{$danhGia->khachHang->ho_ten}}</th>
                        </tr>
                        <tr>
                            <th>Dịch vụ</th>
                            <th>{{$danhGia->dichVu->ten_dich_vu}}</th>
                        </tr>
                        <tr>
                            <th>Điểm</th>
                            <th>{{$danhGia->diem}}</th>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <th>{{$danhGia->trang_thai}}</th>
                        </tr>
                        <tr>
                            <th>Ngày tạo</th>
                            <th>{{$danhGia->created_at}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <h4 style="text-align: center">Đánh giá</h4>
                    <textarea readonly>

                     {{$danhGia->noi_dung}}
                    </textarea>
                </div>
            </div>
        </div>
</div>
</section>
@include('components/footer')
<style>
    .form-group {
        margin-left: 25%;
    }
    .tox-notifications-container {
        display: none;
    }
    .tox .tox-tinymce{
        height: 350px;
    }
</style>

