<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiDichVu extends Model
{
    use HasFactory;
    protected $table = 'loai_dich_vu';
    protected $primaryKey = 'loai_dich_vu_id';
    public $timestamps = true;
    protected $fillable = [
        'loai_dich_vu_id',
        'ten_loa_dich_vu',
        'dien_giai',
        'created_at',
    ];

    public function dichVu()
    {
        return $this->hasMany('App\Models\DichVu','loai_dich_vu_id');
    }
}
