<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DanhGia  extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    public static $STATUS = array(
        "Xác nhận" => "Xác nhận",
        "Huỷ" => "Huỷ",
        "Chờ duyệt" => "Chờ duyệt"
    );
    protected $table = 'danh_gia';
    protected $primaryKey = 'danh_gia_id';
    public $timestamps = true;
    protected $fillable = [
        'danh_gia_id',
        'dich_vu_id',
        'khach_hang_id',
        'noi_dung',
        'diem',
        'trang_thai',
        'created_at'
    ];

    public function khachHang()
    {
        return $this->belongsTo('App\Models\KhachHang', 'khach_hang_id');
    }

    public function dichVu()
    {
        return $this->belongsTo('App\Models\DichVu', 'dich_vu_id');
    }

    public static $star =[
        '     <a href="#" data-rating-value="1"
                                               data-rating-text="1"
                                               class="br-selected br-current"></a>
                                            <a href="#"
                                               data-rating-value="1"
                                               data-rating-text="2"
                                              class=""></a>
                                            <a href="#" data-rating-value="1" data-rating-text="3"
                                                class=""></a>
                                            <a href="#" data-rating-value="1"
                                               data-rating-text="4"
                                               class=""></a>
                                            <a href="#" class="" data-rating-value="1"
                                               data-rating-text="1"></a>',

        '     <a href="#" data-rating-value="1"
                                               data-rating-text="1"
                                               class="br-selected br-current"></a>
                                            <a href="#"
                                               data-rating-value="1"
                                               data-rating-text="2"
                                              class="br-selected br-current"></a>
                                            <a href="#" data-rating-value="1" data-rating-text="3"
                                                class=""></a>
                                            <a href="#" data-rating-value="1"
                                               data-rating-text="4"
                                               class=""></a>
                                            <a href="#" class="" data-rating-value="1"
                                               data-rating-text="1"></a>',
        '     <a href="#" data-rating-value="1"
                                               data-rating-text="1"
                                               class="br-selected br-current"></a>
                                            <a href="#"
                                               data-rating-value="1"
                                               data-rating-text="2"
                                              class="br-selected br-current"></a>
                                            <a href="#" data-rating-value="1" data-rating-text="3"
                                                class="br-selected br-current"></a>
                                            <a href="#" data-rating-value="1"
                                               data-rating-text="4"
                                               class=""></a>
                                            <a href="#" class="" data-rating-value="1"
                                               data-rating-text="1"></a>',
        '     <a href="#" data-rating-value="1"
                                               data-rating-text="1"
                                               class="br-selected br-current"></a>
                                            <a href="#"
                                               data-rating-value="1"
                                               data-rating-text="2"
                                              class="br-selected br-current"></a>
                                            <a href="#" data-rating-value="1" data-rating-text="3"
                                                class="br-selected br-current"></a>
                                            <a href="#" data-rating-value="1"
                                               data-rating-text="4"
                                               class="br-selected br-current"></a>
                                            <a href="#" class="" data-rating-value="1"
                                               data-rating-text="1"></a>',
        '     <a href="#" data-rating-value="1"
                                               data-rating-text="1"
                                               class="br-selected br-current"></a>
                                            <a href="#"
                                               data-rating-value="1"
                                               data-rating-text="2"
                                              class="br-selected br-current"></a>
                                            <a href="#" data-rating-value="1" data-rating-text="3"
                                                class="br-selected br-current"></a>
                                            <a href="#" data-rating-value="1"
                                               data-rating-text="4"
                                               class="br-selected br-current"></a>
                                            <a href="#" class="br-selected br-current" data-rating-value="1"
                                               data-rating-text="1"></a>'
    ];
}

