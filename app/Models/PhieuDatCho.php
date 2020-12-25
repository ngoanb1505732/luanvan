<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PhieuDatCho extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    public static $STATUS = array(
        "Xác nhận" => "Xác nhận",
        "Hoàn tất" => "Hoàn tất",
        "Huỷ" => "Huỷ",
        "Chờ duyệt" => "Chờ duyệt"
    );
    protected $table = 'phieu_dat_cho';
    protected $primaryKey = 'phieu_dat_cho_id';
    public $timestamps = true;
    protected $fillable = [
        'phieu_dat_cho_id',
        'trang_thai',
        'khach_hang_id',
        'nhan_vien_id',
        'ngay_lam',
        'thoi_gian_lam',
        'created_at',
        'updated_at'
    ];

    public function khachHang()
    {
        return $this->belongsTo('App\Models\KhachHang', 'khach_hang_id');
    }

    public function nhanVien()
    {
        return $this->belongsTo('App\Models\NhanVien', 'nhan_vien_id');
    }

    public function datHen()
    {
        return $this->hasMany('App\Models\DatHen', 'phieu_dat_cho_id');
    }

    public function hoaDon()
    {
        return $this->hasMany('App\Models\HoaDon', 'phieu_dat_cho_id');
    }

}
