<?php


namespace App\Http\Controllers\Frontend\Process;


use App\Models\DichVu;
use App\Models\LieuTrinh;

class ProcessController
{
    public function load($id) {
        $service = DichVu::all();
        $item = LieuTrinh::findOrFail((int)$id);
        return view('/frontend/process/load',  compact(["service","item"]));
    }
}
