<?php


namespace App\Http\Controllers\Frontend;


use App\Models\DichVu;

class ActionController
{
    public function index() {
        $service = DichVu::all();
        return view('/frontend/index',  compact(["service"]));
    }
}
