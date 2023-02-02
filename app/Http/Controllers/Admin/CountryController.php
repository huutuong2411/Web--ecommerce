<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcountry()
    {
        $infor = country::paginate(5);
        return view('admin.country', compact("infor"));
    }

    public function getaddcountry()
    {
        return view('admin.addcountry');
    }
    public function postaddcountry(Request $request)
    {
        $country = new country();
        $country->name= $request->country ;
        
        $country->save(); 
        return redirect()->route('getcountry');
    }
     public function deletecountry($id)
    {
        country::destroy($id);
        return redirect()->route('getcountry');
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
   
}
