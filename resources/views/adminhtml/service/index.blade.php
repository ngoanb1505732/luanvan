@section('title', 'Quản lý dịch vụ')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: ecommerce/Pages-list -->
<section class="card">
    <div class="card-header">
        <div class="dropdown pull-right">
           <a href="{{ route("service.create")}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Thêm Dịch Vụ&nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Danh Sách Dịch Vụ</strong>
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
                <th>Tên dịch vụ</th>
                <th>Trạng thái</th>
                <th>Dịch vụ</th>
                <th>Liệu trình</th>
                <th>Giá tiền</th>
                <th>Thời gian</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $item)
                <tr>
                    <th>{{$item["dich_vu_id"]}}</th>
                    <th>{{$item["ten_dich_vu"]}}</th>
                    <th>{{$item["trang_thai"]}}</th>
                    <th>{{$item->loaiDichVu->ten_loai_dich_vu}}</th>
                    <th>{{$item->lieuTrinh!= null ? $item->lieuTrinh->ten_lieu_trinh : ""}}</th>
                    <th>{{$item["gia_tien"]}} vnd</th>
                    <th>{{$item["thoi_gian"]}} phút</th>
                    <th>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                               Hành Động
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="" role="menu">
                                <a class="dropdown-item" href="<?php echo route("service.edit",$item["dich_vu_id"]); ?>"> &nbsp; <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;  Sửa</a>
                                <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn muốn xóa');" href="<?php echo route("service.delete",$item["dich_vu_id"]); ?>"> &nbsp; <i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Xoá</a>
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
