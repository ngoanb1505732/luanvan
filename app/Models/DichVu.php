<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiDichVu;
class DichVu extends Model
{
    use HasFactory;
    public static $STATUS=array(
         "Hết hoạt động"=>"Hết hoạt động",
         "Còn hoạt động"=>"Còn hoạt động"
    );
    protected $table = 'dich_vu';
    protected $primaryKey = 'dich_vu_id';
    public $timestamps = true;
    protected $fillable = [
        'dich_vu_id',
        'ten_dich_vu',
        'trang_thai',
        'mo_ta',
        'anh_dai_dien',
        'loai_dich_vu_id',
        'lieu_trinh_id',
        'gia_tien',
        'thoi_gian',
        'created_at'
    ];

    public function loaiDichVu()
    {
        return $this->belongsTo('App\Models\LoaiDichVu', 'loai_dich_vu_id');
    }

    public function hinhAnh()
    {
        return $this->hasMany('App\Models\HinhAnh','dich_vu_id');
    }
    public function lieuTrinh(){
        return $this->belongsTo('App\Models\LieuTrinh', 'lieu_trinh_id');

    }

    public function danhGia()
    {
        return $this->hasMany('App\Models\DanhGia','dich_vu_id')
            ->where("trang_thai","=","Xác nhận");
    }
}
