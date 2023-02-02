<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {   
        $infor = Auth::user();
        $country = country::select('id','name')->get();
     
        
     
        return view('frontend.account.account',compact("infor","country"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_profile(UpdateRequest $request)
    {
        $users = User::find(Auth::id());
        $image=$request->avatar;
        if(!empty($image)) {
                $users->avatar= $image->getClientOriginalName();
        } 
        if($request->password) {
            $users->password=bcrypt($request->password);
        }
        $users->name= $request->name;
        $users->email= $request->email;
        $users->phone= $request->phone;
        $users->address= $request->address;
        $users->id_country= $request->id_country;
        $users->level=0;
        if($users->save()){
            if(!empty($image)) {
            $image->move(public_path('/admin/assets/images/users'),$image->getClientOriginalName());
            return redirect()->back()->with('success',__('Register success')); 
            }
        } else {
            return redirect()->back()->withErrors('Register error');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
