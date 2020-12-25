@section('title', 'Quản lý hoá đơn')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

    <!-- START: ecommerce/Pages-list -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
            </div>
            <span class="cat__core__title">
            <strong>Danh sách hoá đơn</strong>
        </span>
        </div>


        <div class="card-body">
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
            <table class="table table-hover nowrap" id="example1" width="100%">
                <thead class="thead-default">
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Nhân viên</th>
                    <th>Ngày tạo</th>
                <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th>{{$order["hoa_don_id"]}}</th>
                        <th>{{$order->khachHang->ho_ten}}</th>
                        <th>{{$order->nhanVien->ho_ten}}</th>
                        <th>{{$order["created_at"]}}</th>
                    <th>
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Hành Động
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="" role="menu">
                                    <a class="dropdown-item" href="{{route("admin.order.detail",$order["hoa_don_id"])}}"> &nbsp; <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;  Chi tiết</a>
                                    <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn muốn xóa');" href="{{route("admin.order.delete",$order["hoa_don_id"])}}"> &nbsp; <i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Xoá</a>
                                </ul>
                            </div>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!-- END: ecommerce/products-list -->
    <script>
        $('#id').delay(3000).fadeOut('fast');
    </script>
    <!-- START: page scripts -->
    <script>
        $(function () {

            // Datatables
            $('#example1').DataTable({
                "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25,50, 100, 200, "All"]],
                responsive: true,
                "autoWidth": false
            });

        })
    </script>
    <!-- END: page scripts -->
    <!-- END: page scripts -->
    <style>
        .icon {
            width: 80px;
            height: 80px;
        }
    </style>
@include('components/footer')
