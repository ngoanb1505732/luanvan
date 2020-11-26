@section('title', 'Quản lý khách hàng')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: ecommerce/Pages-list -->
<section class="card">
    <div class="card-header">
        <div class="dropdown pull-right">
           <a href="{{ route("customer.create")}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Thêm Khách Hàng &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Danh Sách Khách Hàng</strong>
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
                <strong>Cập nhật thành công </strong> {{ $message }}!
            </div>
		@endif
        <table class="table table-hover nowrap" id="example1" width="100%">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <th>{{$customer["khach_hang_id"]}}</th>
                    <th>{{$customer["username"]}}</th>
                    <th>{{$customer["ho_ten"]}}</th>
                    <th>{{$customer["ngay_sinh"]}}</th>
                    <th>{{$customer["dia_chi"]}}</th>
                    <th>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                               Hành Động
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="" role="menu">
                                <a class="dropdown-item" href="<?php echo route("customer.edit",$customer["khach_hang_id"]); ?>"> &nbsp; <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;  Sửa</a>
                                <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn muốn xóa');" href="<?php echo route("customer.delete",$customer["khach_hang_id"]); ?>"> &nbsp; <i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Xoá</a>
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
