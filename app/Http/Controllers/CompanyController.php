<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Company::paginate(3);
        return view("company.company_add",['company'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("company.company_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'logo'=>'required|mimes:png,jpg,gif,webp,jpeg|max:10000',
            'website'=>'required'
        ]);
        $imageName =time().'.'.$request->logo->extension();
        $request->logo->move(public_path('Company_logo'),$imageName);
        $company = new Company;
        $company->logo=  $imageName;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website=$request->website;
        $company->save();
        return redirect()->route('company_add');
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
        $company = Company::find(decrypt($id));
        return view('company.company_edit',["data"=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'logo'=>'nullable|mimes:png,jpg,gif,webp,jpeg|max:10000',
            'website'=>'required'

        ]);
        $company=Company::where('id',$id)->first();
        if(isset($request->logo)){
        $imageName =time().'.'.$request->logo->extension();
        $request->logo->move(public_path('Company_logo'),$imageName);
        $company->logo=  $imageName;

        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website=$request->website;
        $company->update();
        return redirect()->route('company_add');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $company = Company::where('id',decrypt($id))->first();
        $company->delete();
        return redirect()->route('company_add');
    }
}
