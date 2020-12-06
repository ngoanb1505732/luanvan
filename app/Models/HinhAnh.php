<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;
    protected $table = 'hinh_anh';
    protected $primaryKey = 'hinh_anh_id';
    public $timestamps = true;
    protected $fillable = [
        'hinh_anh_id',
        'duong_dan',
        'dich_vu_id'
    ];

    public function dichVu()
    {
        return $this->belongsTo('App\Model\DichVu', 'dich_vu_id');
    }
}
