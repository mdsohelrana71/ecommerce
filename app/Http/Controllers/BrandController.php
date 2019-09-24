<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }

    public function newBrand(Request $request){
    	$this->validate($request, [
    		'brand_name' => 'required|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
    		'brand_description' => 'required',
    	]);

    	$image     = $request->file('brand_image');
    	$imageName = $image->getClientOriginalName();
    	$directory = './brand-image/';
    	$image->move($directory,$imageName);
    	$imageUrl  = $directory.$imageName;

    	$brand = new Brand();
    	$brand->brand_name         = $request->brand_name;
    	$brand->brand_description  = $request->brand_description;
    	$brand->brand_image        = $imageUrl;
    	$brand->publication_status = $request->publication_status;
    	$brand->save();
    	return redirect()->back();
    }

    public function manageBrand(){
        $brands = Brand::all(); //Category ta holo Category model  er object.
        
        return view('admin.brand.manage-brand',['brands'=>$brands]);
    }

    public function editBrand($id){
        $brand = Brand::Where('id',$id)->first();//first id ta holo data table id last $id holo uporer id ..first() function er kaj holo ekta row er data ana...
        return view('admin.brand.edit-brand',compact('brand'));
    }
    public function updateBrand(Request $request){

        $brand = Brand::find($request->brand_id);

        $image = $request->file('brand_image');
        if($image){

            unlink($brand->brand_image);

            $imageName = $image->getClientOriginalName();
            $directory = './brand-image/'; 
            $image->move($directory,$imageName);
            $imageUrl  = $directory.$imageName;
        }else {
            $imageUrl  = $brand->brand->image;
        }
        
        $brand->brand_name        = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->brand_image        = $imageUrl;
        $brand->publication_status   = $request->publication_status;
        $brand->save();
        return redirect('/brand/manage-brand');

    }
    public function deleteBrand($id){
        $brand = Brand::find($id);
        unlink($brand->brand_image);
        $brand->delete();
        return redirect('/brand/manage-brand');
    }
}
