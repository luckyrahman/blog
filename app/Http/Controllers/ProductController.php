<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.add_product2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $products = Product::all();
         return view('products.view_products')->with(compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        $file= $request->file('product_image');
        $productData=[];
        for($i=0 ; $i < count($request->name) ;$i++){
           $productData[$i]['name'] =$request->name[$i];
           $productData[$i]['code'] =$request->code[$i];
           $productData[$i]['category'] =$request->category[$i];
           $productData[$i]['sub_category'] =$request->sub_category[$i];
           $productData[$i]['product_group'] =$request->product_group[$i];
           $productData[$i]['measure_unit'] =$request->measure_unit[$i];
           $productData[$i]['buying_price'] =$request->buying_price[$i];
           $productData[$i]['selling_price'] =$request->selling_price[$i];
           $productData[$i]['description'] =$request->description[$i];
           $productData[$i]['status'] =$request->status[$i];
           $productData[$i]['created_at']=date('Y-m-d H:i:s');
           $productData[$i]['product_image'] = $file[$i]->getClientOriginalName();
           // image upload code
           $destinationPath = 'uploads/products';
           $file[$i]->move($destinationPath,$file[$i]->getClientOriginalName());
        }


        Product::insert($productData);
        return redirect('product')->with('success', 'Products Add Successfully !');  
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
       
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
    public function updateCart(Request $request)
    {   
        $rowId = $request->rowId; 
        $qty = $request->qty; 
        Cart::update($rowId, ['qty' => $qty]);
        echo 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rowId = $id;
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function storeCart(Request $request)
    {

        $productData = Product::find($request->product_id);


        $ProductArray = array(
            'id' =>$productData->id, 
            'name' =>$productData->name, 
            'price' =>$productData->selling_price,
            'qty' =>1,
            'options' => [  'product_image' => $productData->product_image,
                            'description'=> $productData->description,
                            'category'=> $productData->category]
        );

        
        Cart::add($ProductArray);
        return redirect()->back();

    }

    public function showCart()
    { 

        $items =  Cart::content();
        return view('products.cart_products');
    }
}
