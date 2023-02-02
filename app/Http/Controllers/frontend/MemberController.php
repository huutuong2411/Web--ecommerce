<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\country;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('frontend.member.login');
    }
    public function register()
    {
        $infor = country::select('id','name')->get();
        return view('frontend.member.register', compact("infor"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {   
        Auth::logout();
        return redirect('/member/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postregister(Request $request)
    {
        $users = new User();
        $image=$request->avatar;
        if(!empty($image)) {
                $users->avatar= $image->getClientOriginalName();
        } 
        $users->name= $request->name;
        $users->email= $request->email;
        $users->password= bcrypt($request->password);
        $users->phone= $request->phone;
        $users->address= $request->address;
        $users->id_country= $request->id_country;
        $users->level=0;
        if($users->save()){
            if(!empty($image)) {
            $image->move('/admin/assets/images/users',$image->getClientOriginalName());
            return redirect()->back()->with('success',__('Register success')); }
        } else {
            return redirect()->back()->withErrors('Register error');
        }
    }

    public function postlogin(Request $request)
    {
        $login = [
            'email'=>$request->email,
            'password'=>$request->password,
            'level'=>0
        ];

        $remember=false;
        if($request->remember_me){
            $request=true;
        }
        if(Auth::attempt($login,$remember)) { 
            return redirect('account');
        } else {    
            return redirect()->back()->withErrors('Login error');
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
