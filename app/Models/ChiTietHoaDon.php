<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'chi_tiet_hoa_don';
    protected $primaryKey = 'chi_tiet_hoa_don_id';
    public $timestamps = true;
    protected $fillable = [
        'chi_tiet_hoa_don_id',
        'hoa_don_id',
        'dich_vu_id',
        'so_luong',
        'gia'
    ];

    public function phieuDatCho()
    {
        return $this->belongsTo('App\Models\PhieuDatCho', 'phieu_dat_cho_id');
    }

    public function dichVu()
    {
        return $this->belongsTo('App\Models\DichVu', 'dich_vu_id');
    }

    public function hoaDon()
    {
        return $this->belongsTo('App\Models\HoaDon', 'hoa_don_id');
    }


}
