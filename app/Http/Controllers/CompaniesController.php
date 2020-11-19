<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\Companies\CompaniesCreateRequest;
use App\Http\Requests\Companies\CompaniesUpdateRequest;

class CompaniesController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.companies.index')->with('companies',Company::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesCreateRequest $request)
    {
        if(empty($request->flag)){
            $request->flag=0;
        }
        Company::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'objective'=>$request->objective,
            'register_address'=>$request->register_address,
            'postal_code'=>$request->postal_code,
            'ds_division'=>$request->ds_division,
            'gs_division'=>$request->gs_division,
            'landline'=>$request->landline,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'flag'=>$request->flag,
        ]);
        

        session()->flash('success','New company added added');
        return redirect(route('companies.index'));
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
        return view('admin.companies.create')->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesUpdateRequest $request,Company $company)
    {
        if(empty($request->flag)){
            $request->flag=0;
        }
        $company->update([
            'name'=>$request->name,
            'code'=>$request->code,
            'objective'=>$request->objective,
            'register_address'=>$request->register_address,
            'postal_code'=>$request->postal_code,
            'ds_division'=>$request->ds_division,
            'gs_division'=>$request->gs_division,
            'landline'=>$request->landline,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'flag'=>$request->flag,
        ]);

        session()->flash('success','Company Updated');
        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        session()->flash('success','Company Deleted');
        return redirect(route('companies.index'));
    }

}