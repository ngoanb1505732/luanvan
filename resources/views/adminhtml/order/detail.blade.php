@section('title', 'Thông tin lịch hẹn')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ route("admin.order")}}" class="btn btn-success "><i class="fa fa-undo"></i>&nbsp; &nbsp;
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


                <div class="col-lg-6 col-xs-12" style="border-right: 2px solid gray;">
                    <h4 style="text-align: center">Thông tin hoá đơn</h4>
                    <table class="table table-hover nowrap" id="example1" width="100%">
                        <thead class="thead-default">
                        </thead>
                        <tbody>
                        <tr>
                            <th>Hoá đơn id</th>
                            <th>{{$order->hoa_don_id}}</th>
                        </tr>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>{{$order->khachHang["ho_ten"]}}</th>
                        </tr>
                        <tr>
                            <th>Tên nhân viên</th>
                            <th>{{$order->nhanVien["ho_ten"]}}</th>
                        </tr>
                        <tr>
                            <th>Tổng tiền</th>
                            <th>{{$order->totalPrice()}} VND</th>
                        </tr>
                        <tr>
                            <th>Ngày tạo</th>
                            <th>{{$order->created_at}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <h4 style="text-align: center">Thông tin dịch vụ làm</h4>
                    <table class="table table-hover nowrap" id="example1" width="100%">
                        <thead class="thead-default">
                        <tr>
                            <th>Dịch vụ id</th>
                            <th>Tên Dịch vụ</th>
                            <th>Số lượng</th>
                            <th>Giá tiền </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($order->chiTietHoaDon as $item)
                            <tr>
                                <th>{{$item["dich_vu_id"]}}</th>
                                <th>{{$item->dichVu["ten_dich_vu"]}}</th>
                                <th>{{$item["so_luong"]}} </th>
                                <th>{{$item["gia_tien"]}} VND</th>
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

