<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'hoa_don';
    protected $primaryKey = 'hoa_don_id';
    public $timestamps = true;
    protected $fillable = [
        'hoa_don_id',
        'nhan_vien_id',
        'khach_hang_id',
        'phieu_dat_cho_id'

    ];

    public function phieuDatCho()
    {
        return $this->belongsTo('App\Models\PhieuDatCho', 'phieu_dat_cho_id');
    }

    public function chiTietHoaDon()
    {
        return $this->hasMany('App\Models\ChiTietHoaDon', 'hoa_don_id');
    }

    public function nhanVien()
    {
        return $this->belongsTo('App\Models\NhanVien', 'nhan_vien_id');
    }

    public function khachHang()
    {
        return $this->belongsTo('App\Models\KhachHang', 'khach_hang_id');
    }


    public function totalPrice()
    {
        $total = 0 ;
    foreach ($this->chiTietHoaDon as $item){
        $total += (int)$item->so_luong *(int)$item->gia_tien;
    }
    return $total;
    }

}
