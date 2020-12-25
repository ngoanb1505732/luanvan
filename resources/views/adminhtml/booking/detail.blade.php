@section('title', 'Thông tin lịch hẹn')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ route("admin.booking")}}" class="btn btn-success "><i class="fa fa-undo"></i>&nbsp; &nbsp;
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
                    <a href="{{route("admin.booking.changeStatus")}}/?id={{$booking->phieu_dat_cho_id}}&&status=0">
                        <button type="button" class="btn btn-danger">Huỷ lịch hẹn</button>
                    </a>
                    <a href="{{route("admin.booking.changeStatus")}}/?id={{$booking->phieu_dat_cho_id}}&&status=1">
                        <button type="button" class="btn btn-primary">Xác nhận</button>
                    </a>
                    <a href="{{route("admin.booking.changeStatus")}}/?id={{$booking->phieu_dat_cho_id}}&&status=2">
                        <button type="button" class="btn btn-success">Tạo hoá đơn</button>
                    </a>
                </div>

                <div class="col-lg-6 col-xs-12" style="border-right: 2px solid gray;">
                    <h4 style="text-align: center">Thông tin lịch hẹn</h4>
                    <table class="table table-hover nowrap" id="example1" width="100%">
                        <thead class="thead-default">
                        {{--                            <tr>--}}
                        {{--                                <th>Id dịch vụ</th>--}}
                        {{--                                <th>Tên Dịch vụ</th>--}}
                        {{--                                <th>Thời gian làm</th>--}}
                        {{--                            </tr>--}}
                        </thead>
                        <tbody>
                        <tr>
                            <th>Trạng thái</th>
                            <th>{{$booking->trang_thai}}</th>
                        </tr>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>{{$booking->khachHang->ho_ten}}</th>
                        </tr>
                        <tr>
                            <th>Tên nhân viên</th>
                            <th>{{$booking->nhanVien->ho_ten}}</th>
                        </tr>
                        <tr>
                            <th>Ngày làm</th>
                            <th>{{$booking->ngay_lam}}</th>
                        </tr>
                       @foreach($booking->hoaDon as $item)
                        <th>Hoá đơn</th>
                        <th><a href="{{route("admin.order.detail",$item->hoa_don_id)}}">Dẫn tới order</a> </th>
                       @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <h4 style="text-align: center">Thông tin dịch vụ làm</h4>
                    <table class="table table-hover nowrap" id="example1" width="100%">
                        <thead class="thead-default">
                        <tr>
                            <th>Id dịch vụ</th>
                            <th>Tên Dịch vụ</th>
                            <th>Thời gian làm</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($booking->datHen as $item)
                            <tr>
                                <th>{{$item->dichVu["dich_vu_id"]}}</th>
                                <th>{{$item->dichVu["ten_dich_vu"]}}</th>
                                <th>{{$item->dichVu["thoi_gian"]}} Phút</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
</style>

