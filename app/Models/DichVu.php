<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    use HasFactory;
    protected $table = 'dich_vu';
    protected $primaryKey = 'dich_vu_id';
    public $timestamps = true;
    protected $fillable = [
        'dich_vu_id',
        'ten_dich_vu',
        'dien_giai',
        'created_at',
    ];

    public function lieuTrinh()
    {
        return $this->hasMany('App\Models\LieuTrinh','dich_vu_id');
    }
}
