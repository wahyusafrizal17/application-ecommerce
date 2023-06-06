<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::all();
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name_category','id');
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $input = $request->all();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();    
            $destinationPath = 'assets/img/product';
            $file->move($destinationPath,$file->getClientOriginalName());

            $input['image'] = $fileName;
        }

        Product::create($input);

        alert()->success('Data berhasil ditambahkan' , 'Success');
        return redirect('administrator/product');

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
        $data['categories'] = Category::pluck('name_category','id');
        $data['product'] = Product::find($id);
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $product = Product::find($id);
        
        $input = $request->all();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();    
            $destinationPath = 'assets/img/product';
            $file->move($destinationPath,$file->getClientOriginalName());

            $input['image'] = $fileName;
        }
        
        $product->update($input);

        alert()->success('Data berhasil diubah' , 'Success');
        return redirect('administrator/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();

        return 'success';
    }

    public function sendId(Request $request)
    {
        return $request->id;
    }

    public function saveProduct(Request $request)
    {
        $input = $request->all();
        $input['status'] = 'PEMASUKAN';

        Stock::create($input);

        return 'sucess';
    }
}
