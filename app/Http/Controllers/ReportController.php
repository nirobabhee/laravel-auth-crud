<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DataTables;
use DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (request()->has('from')) {

                $data = Employee::select('*')->where('joining_date', '>', request()->from)->where('joining_date', '<', request()->to)->with('company');
            } else {
                $data = Employee::select('*')->with('company');
            }
            return Datatables::of($data)
                ->addIndexColumn()


                ->make(true);
        }
        return view('home');
    }
    public function dateRange(Request $request)
    {
        if (request()->ajax()) {
            // $get = Employee::where("joining_date", "<= ", $request->from_date)->where("joining_date", "= ", $request->to_date)->get();
            $get = Employee::where("joining_date", "<= ", '2021-11-01 00:00:00')->where("joining_date", "= ", '2021-11-06  0:00:00')->get();
            dd($get);
            return DataTables::of($get)->addIndexColumn()->make(true);
        }
        return view('home');
    }
}
