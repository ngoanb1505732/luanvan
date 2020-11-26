<?php


namespace App\Http\Controllers\Adminhtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CustomAction extends Controller
{
    public function logoutAdmin(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }
}
