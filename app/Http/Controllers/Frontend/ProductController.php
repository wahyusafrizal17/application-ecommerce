<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Cart;
use Auth;

class ProductController extends Controller
{
    public function index()
    {

        $data['setting']        = Setting::find(1);
        $data['all']            = Product::all();
        $data['terlaris']       = Product::paginate(3);
        $data['categories']     = Category::all();
        return view('frontend.product.index',$data);
    }

    public function detail($slug)
    {
        $data['setting']        = Setting::find(1);
        $data['product']        = Product::where('slug',$slug)->first();
        return view('frontend.product.detail',$data);
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();

        $data['setting']        = Setting::find(1);
        $data['all']            = Product::where('category_id',$category->id)->get();
        $data['terlaris']       = Product::paginate(3);
        $data['categories']     = Category::all();

        return view('frontend.product.index',$data);
    }

    public function search(Request $request)
    {
        $data['setting']        = Setting::find(1);
        $data['all']            = Product::where('name_product', 'LIKE', "%$request->search%")->get();
        $data['terlaris']       = Product::paginate(3);
        $data['categories']     = Category::all();

        return view('frontend.product.index',$data);
    }
}
