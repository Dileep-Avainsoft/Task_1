<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data=Employee::paginate(2);
        // return view("employee.emp_view",["employee"=>$data]);


    $employees = Employee::select('employees.*', 'companies.name as company_name')
    ->leftJoin('companies', 'employees.company', '=', 'companies.id')
    ->paginate(2);
return view('employee.emp_view', ['employee'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Company::get();
        return view("employee.emp_create",["company"=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'company'=>'required',
            'email'=>'required',
            'phone'=>'required',

        ]);
        $employee = new Employee;

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();
        return redirect()->route('emp_view');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $data= Employee::find(decrypt($id));
         $company=Company::get();
        return view("employee.emp_edit",["company"=>$company],["Employee"=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'company'=>'required',
            'email'=>'required',
            'phone'=>'required',

        ]);
        // $employee = new Employee;
        $employee=Employee::where('emp_id',$id)->first();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->update();
        return redirect()->route('emp_view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $Emp = Employee::where('emp_id',decrypt($id))->first();
        $Emp->delete();
        return redirect()->route('emp_view');
    }
}
