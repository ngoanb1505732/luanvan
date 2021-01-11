<?php


namespace App\Http\Controllers\Frontend\TypeService;


use App\Http\Controllers\Controller;
use App\Models\DichVu;
use App\Models\LoaiDichVu;

class TypeServiceController extends Controller
{
    public function load($id) {
        $typeServices = LoaiDichVu::all();
        $item = LoaiDichVu::findOrFail((int)$id);
        $services = DichVu::all()->random(3);
        return view('/frontend/typeService/load',  compact(["typeServices","item","services"]));
    }
}
