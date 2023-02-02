<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checksession()
    {
        
       dd(session()->get('cart'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.cart.cart');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addcart(Request $request)
    {
        // Session::flush('cart');
        $cart=Session::get('cart');
        if(isset($cart[$request->getID])){
            $cart[$request->getID]['cartQty']+=1;
        } else {
        $cart[$request->getID] = array(
            'productID'=>$request->getID,
            'productName'=>$request->getName,
            'productPrice'=>$request->getPrice,
            'cartQty'=>$request->getQty,
            'cartImg'=>$request->getImg,
        );
        }

        Session::put('cart',$cart);
        return response()->json(['dem'=>count(Session::get('cart')),'success'=>'Thêm vào giỏ hàng thành công']);
    }

    public function updatecart(Request $request)
    {
       $cart=session()->get('cart'); 
       
        if(isset($cart[$request->idUP]))
        {
            $cart[$request->idUP]['cartQty']+=1;
        }
        if(isset($cart[$request->idDOWN]))
        {
            $cart[$request->idDOWN]['cartQty']-=1;
            if($cart[$request->idDOWN]['cartQty']<1)
            {
                unset($cart[$request->idDOWN]);
            }
        }
        if(isset($cart[$request->idDEL]))
        {
            unset($cart[$request->idDEL]);
        }


         Session::put('cart',$cart);
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
