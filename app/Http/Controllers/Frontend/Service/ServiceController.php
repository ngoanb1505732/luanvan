<?php


namespace App\Http\Controllers\Frontend\Service;


use App\Models\LoaiDichVu;
use App\Models\DichVu;

class ServiceController
{
    public function load($id) {
        $typeServices = LoaiDichVu::all();
        $item = DichVu::findOrFail((int)$id);
        return view('/frontend/service/load',  compact(["typeServices","item"]));
    }
}
