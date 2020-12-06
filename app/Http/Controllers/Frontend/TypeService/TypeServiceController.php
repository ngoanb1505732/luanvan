<?php


namespace App\Http\Controllers\Frontend\TypeService;


use App\Models\LoaiDichVu;

class TypeServiceController
{
    public function load($id) {
        $typeServices = LoaiDichVu::all();
        $item = LoaiDichVu::findOrFail((int)$id);
        return view('/frontend/typeService/load',  compact(["typeServices","item"]));
    }
}
