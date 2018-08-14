<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addcategory(Request $request)
    {
        $category = new Category();
  
        $category->newcategory = request('newcategory');
  
        $category->save();
  
        return $category;
     }  
     public function category()
     {
       return Category::all();
     }
     public function destroy($id)
    {
      Category::find($id)->delete();

      return 'deleted';
    }
}
