<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\File;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(3);
        return view("admin.contents.company.all", compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.contents.company.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request, Company $company)
    {
        //dd($request);

        $company = $company->create([

            'company_name' => $request->company_name,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'summery' => $request->summery,
            'email' => $request->email,
            'logo' => $request->logo
        ]);
        //dd($company->id);
        if ($request->hasFile('company_file')) {

            $file = new File();
            $file->company_id = $company->id;
            $file->file_attachment = $request->file;
            $file->save();
        }


        return redirect()->route('company.edit', ['company' => $company])->with('message', 'Company create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view("admin.contents.company.form", compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        if ($request->hasFile('company_file')) {
            $file = File::where('company_id', $company->id)->update([

                'file_attachment' => $request->file

            ]);
        }
        $company->update($request->except(['_method', '_token','file']));
        return redirect()->route('company.edit', ['company' => $company])->with('message', 'Company create successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request)
    {

        //dd($request);
        $company_id = $request->input('company_id');
        $company = Company::find($company_id);
        $company->delete();

        return redirect()->route('company.index')->with('message', "Deleted Successfully!");
    }
}
