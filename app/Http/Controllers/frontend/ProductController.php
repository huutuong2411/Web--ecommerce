<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Product;
use App\Models\frontend\Category;
use App\Models\frontend\Brand;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myproduct()
    {
        $infor = Product::where('id_user',Auth::id())->orderBy('updated_at','desc')->paginate(6);
             
        return view('frontend.product.myproduct',compact("infor"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $category = Category::select('id','category')->get();
        $brand = Brand::select('id','brand')->get();
        return view('frontend.product.addproduct',compact("category","brand"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postadd(ProductRequest $request)
    {
        
        $product = new Product();
        $id_user=Auth::id();
        $product->name= $request->name;
        $product->price= $request->price;
        $product->id_category= $request->category;
        $product->id_brand= $request->brand;
        $product->id_user= $id_user;
        $product->status= $request->status;
        $product->sale= $request->sale;
        $product->company= $request->company;

        if($request->hasfile('image'))
        {

            foreach ($request->file('image') as $image) 
            {
               $time= strtotime(date('Y-m-d H:i:s'));
               $name = $time."_".$image->getClientOriginalName();
               $name_2 = "hinh85_".$time."_".$image->getClientOriginalName();
               $name_3="hinh329_".$time."_".$image->getClientOriginalName();
               
               
               // path:
               if(!is_dir('frontend/images/product/'.$id_user)) {
                    mkdir('frontend/images/product/'.$id_user);
               }
               $path = public_path('/frontend/images/product/'.$id_user.'/'.$name);
               $path2 = public_path('/frontend/images/product/'.$id_user.'/'.$name_2);
               $path3 = public_path('/frontend/images/product/'.$id_user.'/'.$name_3);
               //resize:
               Image::make($image->getrealpath())->save($path);
               Image::make($image->getrealpath())->resize(85,84)->save($path2);
               Image::make($image->getrealpath())->resize(329,380)->save($path3);
               // lưu tên ảnh gốc vào mảng
               $data[] = $name;
            }
        }
        $product->image = json_encode($data);//ok
        if($product->save()){   
            return redirect()->back()->with('success',__('add item success')); 
        } else {
            return redirect()->back()->withErrors('add item error');
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
        $infor= Product::find($id);
        $category = Category::select('id','category')->get();
        $brand = Brand::select('id','brand')->get();
        return view('frontend.product.editproduct',compact("infor","category","brand"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postedit(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $id_user=Auth::id();
        $product->name= $request->name;
        $product->price= $request->price;
        $product->id_category= $request->category;
        $product->id_brand= $request->brand;
        $product->status= $request->status;
        $product->sale= $request->sale;
        $product->company= $request->company;
        $delete=$request->checkbox;
        // anh lấy từ dtb ra
        $anh =json_decode($product->image);
        // xóa ảnh đã chọn
        if($delete)
        {
            foreach ($anh as $key => $value) 
            {     
                if (in_array($value,$delete)) 
                    {
                      unset($anh[$key]);
                      if (file_exists('frontend/images/product/'.$id_user.'/'.$value))
                      {
                        unlink('frontend/images/product/'.$id_user.'/'.$value);
                        unlink('frontend/images/product/'.$id_user.'/'.'hinh85_'.$value);
                        unlink('frontend/images/product/'.$id_user.'/'.'hinh329_'.$value);
                      }
                    }
                
            }
        }
        
        // check tổng ảnh, resize ảnh nếu true
        if($request->hasfile('image'))
        {
            $addImage=$request->file('image');
            // tổng>3 -> lỗi 
            if(count($anh)+count($addImage)>3){
                return redirect()->back()->withErrors('edit item error');
            } else {
                foreach ($addImage as $image) 
                {
                   $time= strtotime(date('Y-m-d H:i:s'));
                   $name = $time."_".$image->getClientOriginalName();
                   $name_2 = "hinh85_".$time."_".$image->getClientOriginalName();
                   $name_3="hinh329_".$time."_".$image->getClientOriginalName();
                   // path:
                   if(!is_dir('frontend/images/product/'.$id_user)) {
                        mkdir('frontend/images/product/'.$id_user);
                   }
                   $path = public_path('/frontend/images/product/'.$id_user.'/'.$name);
                   $path2 = public_path('/frontend/images/product/'.$id_user.'/'.$name_2);
                   $path3 = public_path('/frontend/images/product/'.$id_user.'/'.$name_3);
                   //resize:
                   Image::make($image->getrealpath())->save($path);
                   Image::make($image->getrealpath())->resize(85,84)->save($path2);
                   Image::make($image->getrealpath())->resize(329,380)->save($path3);
                   // lưu tên ảnh gốc vào mảng
                   $anh[] = $name;
                }
            }
        }
        $product->image = json_encode(array_values($anh));
        if($product->save()){   
            return redirect()->back()->with('success',__('add item success')); 
        } else {
            return redirect()->back()->withErrors('add item error');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         Product::destroy($id);
        return redirect()->route('myproduct');
    }
}
