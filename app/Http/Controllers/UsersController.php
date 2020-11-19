<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UsersCreateRequest;
use App\Http\Requests\Users\UsersUpdateRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {
        if(empty($request->online)){
            $request->online=0;
        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'about'=>$request->about,
            'online'=>$request->online,
        ]);

        session()->flash('success','New staff member added');
        return redirect(route('users.index'));
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
    public function edit(User $user)
    {
        return view('admin.users.create')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request,User $user)
    {
        if(!isset($request->online)){
            $request->online=0;
        }
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'about'=>$request->about,
            'online'=>$request->online,
        ]);
        if(isset($request->password)){
            $user->update([
                'password'=>Hash::make($request->password),
                ]);
        }

        session()->flash('success','Staff member Updated');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success','Staff member Deleted');
        return redirect(route('users.index'));
    }

    public function togglestatus(User $user){
        if($user->online==1){            
            $user->online=0;
            $user->save();
            session()->flash('success','User suspended successfully');
        }
        else{
            $user->online=1;
            $user->save();
            session()->flash('success','User active successfully');
        }
        return redirect(route('users.index'));
    }
    
    public function togglerole(User $user){
        if($user->role=='Admin'){            
            $user->role='Staff';
            $user->save();
            session()->flash('success','User demoted as staff successfully');
        }
        elseif($user->role=='Staff'){
            $user->role='Admin';
            $user->save();
            session()->flash('success','User promoted as Admin successfully');
        }
        return redirect(route('users.index'));
    }
}
