<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhan_vien';
    protected $primaryKey = 'nhan_vien_id';
    public $timestamps = true;
    protected $fillable = [
        'nhan_vien_id',
        'ho_ten',
        'dia_chi',
        'anh',
        'sdt',
        'created_at',
        'updated_at',
        'username',
        'password',
        'ngay_sinh'
    ];
    

}
