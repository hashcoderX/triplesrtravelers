<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategory(Request $request){
         $catname = $request->category;

         $category = Category::where('catname', $catname)->first();

         if ($category) {
            return response()->json(['message' => 'The category is alrady registerd'], 201);
         } else {
            $category = new Category();
            $category->catname = $catname;
            $category->save();
            return response()->json(['message' => 'The category is registerd success'], 200);
         }   

        
    }
}
