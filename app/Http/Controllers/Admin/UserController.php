<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin\country;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getprofile()
    {
        $infor = country::select('id','name')->get();
       
        return view('admin.user.profile', compact("infor"));
    }
    public function postprofile(ProfileRequest $request)
    {
        
        $IDuser = Auth::id();
        $user= User::findOrFail($IDuser);
        $data=$request->all();
       
        $image=$request->avatar;
        if(!empty($image)) {
                $data['avatar'] = $image->getClientOriginalName();
        } 
        if($data['password']) {
                $data['password'] = bcrypt($data->password);
        } else {
            $data['password'] = $user->password;
        }  

        if($user->update($data)){
            if(!empty($image)) {
                // $image->move('/upload',$image->getClientOriginalName());

        $image->move(public_path('/admin/assets/images/users'), $image->getClientOriginalName());
                return redirect()->back()->with('success',__('update profile success')); 
            }
        } else {
            return redirect()->back()->withErrors('Update profile error');
        }

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
    public function store(Request $request)
    {
        //
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


