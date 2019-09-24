<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\SubImage;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index(){
        $search_data=request()->search;
    	$query  = Product::where('publication_status',1);

    	if(!empty($search_data)){
    	    $query->where('product_name','LIKE','%'.$search_data.'%')->orwhere('product_price','LIKE','%'.$search_data.'%');
        }
    	$products=$query->get();
    	$categorys = Category::where('publication_status',1)->get();
        return view('front.home.home',compact('products','categorys'));
    }
    public function categoryProduct($id){
        $products     = Product::where('category_id',$id)->orderBy('id','DESC')->get();
        $categorys    = Category::where('publication_status',1)->get();
        $categoryName =Category::find($id)->category_name;
        return view('front.category.category-product',[
            'categorys'    =>$categorys,
            'products'     =>$products,
            'categoryName' =>$categoryName
        ]);
    }
    public function productDetail($id){
        $product         = Product::find($id);
        $categoryProducts = Product::where('category_id',$product->category_id)->orderBy('id','DESC')->get();
        $subImages       = SubImage::where('product_id',$id)->get();
        $categorys       = Category::where('publication_status',1)->get();
        return view('front.product.product-detail',[
            'categorys'       =>$categorys,
            'product'         =>$product,
            'subImages'       =>$subImages,
            'categoryProducts' =>$categoryProducts
        ]);
    }
}
