<?php


namespace App\Http\Controllers\Frontend;


use App\Models\LoaiDichVu;

class ActionController
{
    public function index() {
        $typeServices = LoaiDichVu::all();
        return view('/frontend/index',  compact(["typeServices"]));
    }
}
