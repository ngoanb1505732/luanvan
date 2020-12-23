<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DatHen  extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'dat_hen';
    protected $primaryKey = 'dat_hen_id';
    public $timestamps = true;
    protected $fillable = [
        'dat_hen_id',
        'phieu_dat_cho_id',
        'dich_vu_id'
    ];

    public function phieuDatCho()
    {
        return $this->belongsTo('App\Models\PhieuDatCho', 'phieu_dat_cho_id');
    }

    public function dichVu()
    {
        return $this->belongsTo('App\Models\DichVu', 'dich_vu_id');
    }


}

