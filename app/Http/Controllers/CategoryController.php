<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller{

    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function newCategory(Request $request){

    	$image     = $request->file('category_image');//image er akti object tohiri korlam....
    	$imageName = $image->getClientOriginalName();//ei function diye getClientOriginalName image er name ti $imageName variable a rakhchi....
    	$directory = './category-image/';//amra ekti directory tohiri korlam. seita laravel er index.php file er sakheppy category_image name akti folder tohiri hobe 
    	$image->move($directory,$imageName);//$image object er file tike. move function ta directory and name onujahi move kore dibe.....
    	$imageUrl  = $directory.$imageName;

    	$category = new Category();
    	$category->category_name        = $request->category_name;
    	$category->category_description = $request->category_description;
    	$category->category_image       = $imageUrl;
    	$category->publication_status   = $request->publication_status;
    	$category->save();
    	return redirect()->back()->with('message', 'Category info create Successfully.');
    }

    public function manageCategory(){

        $categories = Category::all(); //Category ta holo Category model  er object.
        return view('admin.category.manage-category',['categories'=>$categories]);
    }

    public function editCategory($id){
        $category = Category::Where('id',$id)->first();//first id ta holo data table id last $id holo uporer id ..first() function er kaj holo ekta row er data ana...
        return view('admin.category.edit-category',compact('category'));
    }

    public function updateCategory(Request $request){

        $category = Category::find($request->category_id);

        $image = $request->file('category_image');
        if($image){

            unlink($category->category_image);

            $imageName = $image->getClientOriginalName();
            $directory = './category-image/'; 
            $image->move($directory,$imageName);
            $imageUrl  = $directory.$imageName;
        }else {
            $imageUrl  = $category->category->image;
        }
        
        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->category_image       = $imageUrl;
        $category->publication_status   = $request->publication_status;
        $category->save();
        return redirect('/category/manage-category');

    }

    public function deleteCategory($id){
        $category = Category::find($id);
        unlink($category->category_image);
        $category->delete();
        return redirect('/category/manage-category');
        
    }
}
