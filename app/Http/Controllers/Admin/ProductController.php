<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use illuminate\Support\Str;


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
        return view('Admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name_category','id');
        return view('Admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name_product);

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
        return view('Admin.product.edit',$data);
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
        $product = Product::find($id);
        
        $input = $request->all();
        $input['slug'] = Str::slug($request->name_product);

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
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        alert()->success('Data berhasil diubah' , 'Success');
        return redirect('administrator/product');
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