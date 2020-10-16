<?php


namespace App\Http\Controllers\Adminhtml\Employee;


use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $employees = array();
        for($i=0;$i<30;$i++){
            $employee=array(
                "id"=>$i+1,
                "ho_ten"=>"Nhân Viên ".($i+1),
                "ngay_sinh"=>"1/1/1997",
                "dia_chi"=>"Vinh Long",

            );
            array_push($employees,$employee);
        }
        return view('/adminhtml/employee/index',  compact(["employees"]));
    }

    public function create(){

        return view('/adminhtml/employee/create');

    }

public function save(){

}
}
