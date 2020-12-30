<?php


namespace App\Http\Controllers\Frontend\Service;


use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use App\Models\LoaiDichVu;
use App\Models\DichVu;

class ServiceController extends Controller
{
    public function load($id) {
        $typeServices = LoaiDichVu::all();
        $item = DichVu::findOrFail((int)$id);
        $star =DanhGia::$star;
        return view('/frontend/service/load',  compact(["typeServices","item","star"]));
    }
}
