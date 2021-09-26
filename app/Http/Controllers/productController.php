<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\category;
use Validator;

use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record=product::whereStatus(1)->latest()->get();
        //  ->paginate(25);
    
            return view('admin.product', compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=category::whereStatus(1)->latest()->get();
        return view('admin.components.NewProduct', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'title' => 'required',
            'selectCategory' => 'required',
            'picture'  => 'required',
            'price'=>'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            // 'picture'  => 'required|mimes:png,jpg,jpeg|max:2048',
            'amount' => 'required'
           // 'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
        ]);
        if($validator->fails())
        {

              return response()->json([
              "code"  =>  '400',
              "message"  => $validator->messages(),
              ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        else {
        //     // dd($request->hasFile('image'));
    //     $product = Input::except('_method','_token');
    //     if($request->hasFile('picture')){
    //         $upload_path =public_path().'/images/uploads';
    //         //creare seperate folder for each user
    //               $upPath=$upload_path;
    //             //   if(!file_exists($upPath))
    //             //   {
    //             //              mkdir($upPath, 0777, true);
    //             //   }

    //         $image = $request->file('picture');
    //         $filename = trim(time().uniqid().'.'.$image->getClientOriginalExtension());
    //         $location = $upPath.'/' . $filename;
    //         Image::make($image)->resize(445,350)->save($location);
    //         $product['picture'] = '../images/uploads/'.$filename;
    //     }
    //      $product['tenantId'] = "AoFoLyuetVYItEGpcacFcYIpT";
    //      $product['id'] = $request->barcode;
    //    $ra= supermarketProducts::create($product);
       
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
