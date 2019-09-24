<?php

namespace App\Http\Controllers;
use App\Category;
use App\Brand;
use App\Product;
use App\SubImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProduct(){

        $categories = Category::all();
        //return $categories;
    	$brands = Brand::all();
    	//return $brands;

        // return view('admin.product.add-product',[
        // 	'categories' => '$categories',
        // 	'brands'     => '$brands',
        // ]);

        return view('admin.product.add-product')->with(['categories'=>$categories ,'brands'=>$brands]);

    }

    public function newProduct(Request $request){

    	$image     = $request->file('product_image');
    	$imageName = $image->getClientOriginalName();//getClientOriginalName functoon ta use kore image er name take $imageName variable a rakha holo ...
    	$directory = './product-image/';
    	$image->move($directory,$imageName);
    	$imageUrl  = $directory.$imageName;

    	$product = new Product();
    	$product->category_id               = $request->category_id;
    	$product->brand_id 					= $request->brand_id;
    	$product->product_name 				= $request->product_name;
    	$product->product_code 				= $request->product_code;
    	$product->product_price 			= $request->product_price;
    	$product->product_quantity 			= $request->product_quantity;
    	$product->product_short_description = $request->product_short_description;
    	$product->product_long_description 	= $request->product_long_description;
    	$product->product_image 			= $imageUrl;
    	$product->publication_status 		= $request->publication_status;
    	$product->save();

    	$files = $request->file('file');
    	foreach ($files as $file) {
    		$newImageName = $file->getClientOriginalName();
	    	$newDirectory = './product-sub-image/';
	    	$file->move($newDirectory,$newImageName);
	    	$imagePath  = $newDirectory.$newImageName;

	    	$subImage = new SubImage();
	    	$subImage->product_id = $product->id;
	    	$subImage->sub_image  = $imagePath;
	    	$subImage->save();
    	}

    	return redirect()->back();

    }

    public  function getCategoryBrandName($categoryid,$brandid){
        $categoryName  = Category::find($categoryid)->category_name;
        $brandName     = Brand::find($brandid)->brand_name;
        $lastProductId = Product::orderBy('id','DESC')->first()->id;

        $result = [
            'category_name' =>$categoryName,
            'brand_name'    =>$brandName,
            'lastProductId' =>($lastProductId+1),
        ];

        return json_encode ($result);
    }

    public function manageProduct(){
        $products = Product::orderBy('id','DESC')->take(50)->select('id','category_id','brand_id','product_name','product_code','product_price','publication_status')->get();
        //Query Builder....
//        $products = DB::table('products')
//                    ->join('categories','products.category_id', '=', 'categories.id')
//                    ->select('products.*', 'categories.category_name')
//                    ->get();
//        return $products;
        return view('admin.product.manage-product',['products'=>$products]);
    }

    public function viewProduct($id){
        $product = Product::find($id);
        return view('admin.product.view-product',['product'=>$product]);
    }
}
