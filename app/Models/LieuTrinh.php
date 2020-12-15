<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LieuTrinh extends Model
{
    use HasFactory;
    protected $table = 'lieu_trinh';
    protected $primaryKey = 'lieu_trinh_id';
    public $timestamps = true;
    protected $fillable = [
        'lieu_trinh_id',
        'dien_giai',
        'ten_lieu_trinh'

    ];

    public function dichVu()
    {
        return $this->hasMany('App\Models\DichVu','lieu_trinh_id');
    }
}
