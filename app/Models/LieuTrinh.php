<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DichVu;
class LieuTrinh extends Model
{
    use HasFactory;
    public static $STATUS=array(
        "Còn hoạt động"=>"Còn hoạt động",
        "Hết hoạt động"=>"Hết hoạt động"
    );
    protected $table = 'lieu_trinh';
    protected $primaryKey = 'lieu_trinh_id';
    public $timestamps = true;
    protected $fillable = [
        'lieu_trinh_id',
        'ten_lieu_trinh',
        'trang_thai',
        'mo_ta',
        'anh_dai_dien',
        'dich_vu_id',
        'gia_tien',
        'thoi_gian',
        'created_at'
    ];

    public function dichVu()
    {
        return $this->belongsTo('App\Models\DichVu', 'dich_vu_id');
    }

    public function hinhAnh()
    {
        return $this->hasMany('App\Models\HinhAnh','lieu_trinh_id');
    }
}
