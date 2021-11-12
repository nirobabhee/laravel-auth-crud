<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
use DataTables;
use Illuminate\Support\Facades\URL;

class EmployeeController extends Controller
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

                ->editColumn('image', function ($row) {
                    return '<img src="' . asset('uploads/employees/' . $row->image) . '" width="100px" height="70px" alt="Employee Img">';
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . URL::to('edit/' . $row->id) . '"><button type="button"
                    class="btn btn-outline-success btn-sm">Edit</button></a><a href="' . URL::to('delete-employee/' . $row->id) . '"><button type="button"
                                                             class="btn btn-outline-danger btn-sm">Delete</button></a>';
                    // <a href="{{ '/edit/'.$value->id }}"><button type="button"
                    //                                         class="btn btn-outline-success btn-sm">Edit</button></a>
                    //                                 <a href="{{ '/delete-employee/'.$value->id }}"><button type="button"
                    //                                         class="btn btn-outline-danger btn-sm">Delete</button></a>
                    return $btn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }



        return view('employee.index');
    }
    public function insert_form()
    {
        $companies = Company::all();
        return view('employee.insert', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->company_id = $request->company;
        $employee->city = $request->city;
        $employee->joining_date = $request->joining_date;
        // img-uploads//
        if ($request->hasFile('image')) {
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Uploads/employees', $filename);
            // db naming //
            $employee->image = $filename;
        }

        $employee->save();
        return  redirect()->back()->with('status', 'Employee Added Successfully!');
    }
    public function edit($id)
    {
        $data = Employee::find($id);
        $companies = Company::all();
        return view('employee.edit', ['edit_employee' => $data, 'companies' => $companies]);
    }
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->company_id = $request->company;
        $employee->city = $request->city;
        $employee->joining_date = $request->joining_date;
        // img-uploads//
        if ($request->hasFile('image')) {
            // --------Check----------
            $destination = 'Uploads/employees' . $employee->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            // --------Check----------

            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('Uploads/employees', $filename);
            // db naming //
            $employee->image = $filename;
        }
        $employee->update();
        return redirect()->back()->with('status', 'Employee updated Successfully!');
    }


    function delete($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->back()->with('status', 'Employee Deleted Successfully!');
    }
}
