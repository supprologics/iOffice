<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Director;
use App\Company;
use App\Http\Requests\Directors\DirectorsCreateRequest;
use App\Http\Requests\Directors\DirectorsUpdateRequest;

class DirectorsController extends Controller
{
    //type=1 director
    //type=2 shareholder
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.directors.index')->with('directors',Director::all());
    }

    public function alldirectors()
    {
        return view('admin.directors.index')->with('directors',Director::all()->where('flag','<>',2))->with('type',1);
    }

    public function allshareholders()
    {
        return view('admin.directors.index')->with('directors',Director::all()->where('flag','<>',1))->with('type',2);
    }

    public function companydirectors(Company $company)
    {
        return view('admin.directors.index')->with('directors',Director::all()->where('company_id',$company->id)->where('flag','<>',2))->with('type',1)->with('company',$company->id);
    }

    public function companyshareholders(Company $company)
    {
        return view('admin.directors.index')->with('directors',Director::all()->where('company_id',$company->id)->where('flag','<>',1))->with('type',2)->with('company',$company->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createdirector(Company $company)
    {
        return view('admin.directors.create')->with('type',1)->with('company',$company->id);
    }

    public function createshareholder(Company $company)
    {
        return view('admin.directors.create')->with('type',2)->with('company',$company->id);
    }

    public function create()
    {
        return view('admin.directors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectorsCreateRequest $request)
    {

        $director=Director::create([
            'company_id'=>$request->company_id,
            'nic'=>$request->nic,
            'passport'=>$request->passport,
            'landline'=>$request->landline,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'title'=>$request->title,
            'full_name'=>$request->full_name,
            'occupation'=>$request->occupation,
            'ds_division'=>$request->ds_division,
            'gs_division'=>$request->gs_division,
            'postal_code'=>$request->postal_code,
            'residential_address'=>$request->residential_address,
            'foreign_address'=>$request->foreign_address,
            'no_of_shares'=>$request->no_of_shares,
            'norminal_value'=>$request->norminal_value,
            'flag'=>$request->flag,
        ]);
        

        if($director->flag==1){
            session()->flash('success','New director added');
            return redirect(route('companydirectors',$director->company_id));
        }
        else{
            session()->flash('success','New shareholder added');
            return redirect(route('companyshareholders',$director->company_id));
        }
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
    public function edit(Director $director)
    {
        return view('admin.directors.create')->with('director',$director);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DirectorsUpdateRequest $request,Director $director)
    {
        $director->update([
            'nic'=>$request->nic,
            'passport'=>$request->passport,
            'landline'=>$request->landline,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'title'=>$request->title,
            'full_name'=>$request->full_name,
            'occupation'=>$request->occupation,
            'ds_division'=>$request->ds_division,
            'gs_division'=>$request->gs_division,
            'postal_code'=>$request->postal_code,
            'residential_address'=>$request->residential_address,
            'foreign_address'=>$request->foreign_address,
            'no_of_shares'=>$request->no_of_shares,
            'norminal_value'=>$request->norminal_value,
            'flag'=>$request->flag,
        ]);

        if($director->flag==1){
            session()->flash('success','Director Updated');
            return redirect(route('companydirectors',$director->company_id));
        }
        else{
            session()->flash('success','Shareholder Updated');
            return redirect(route('companyshareholders',$director->company_id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        $del_director_flag=$director->flag;
        $director->delete();

        if($director->flag==1){
            session()->flash('success','Director Deleted');
            return redirect(route('companydirectors',$director->company_id));
        }
        else{
            session()->flash('success','Shareholder Deleted');
            return redirect(route('companyshareholders',$director->company_id));
        }
    }

}
