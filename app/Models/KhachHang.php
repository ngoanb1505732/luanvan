<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table = 'khach_hang';
    protected $primaryKey = 'khach_hang_id';
    public $timestamps = true;
    protected $fillable = [
        'khach_hang_id',
        'ho_ten',
        'dia_chi',
        'sdt',
        'created_at',
        'updated_at',
        'username',
        'password',
        'ngay_sinh'
    ];


}
