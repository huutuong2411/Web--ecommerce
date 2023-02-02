<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Product;
use App\Models\frontend\Brand;
use App\Models\frontend\Category;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price=$request->price;
        switch ($price) {
            case 1:
                $min=100000;
                $max=150000;
                break;
            case 2:
                 $min=150000;
                $max=200000;
                break;
            default:
                $min=Product::min('price');
                $max=Product::max('price');
                break;
        }

        $category=Category::select('id','category')->get();
        $brand = Brand::select('id','brand')->get();
        

        $infor= Product::where('name','LIKE',"%{$request->name}%");
        if($request->has('price')){
           $infor=$infor->where('price','>=',$min)->where('price','<=',$max); 
        }
        if($request->has('brand')){
           $infor=$infor->where('id_brand',$request->brand); 
        }
        if($request->has('category')){
           $infor=$infor->where('id_category',$request->category); 
        }
        if($request->has('status')){
           $infor=$infor->where('status',$request->status); 
        }
        $infor=$infor->get();
        return view('frontend.search.search',compact("infor","category","brand"));
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
