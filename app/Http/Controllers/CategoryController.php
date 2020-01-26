<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function category(){
        return view('categories.category');
    }

    public function addCategory(Request $request){
        $this->validate($request, [
            'category' => 'required'
        ]);
        $category = new Category;
        $category->category = $request->input('category');
        $category->save();
        return redirect('/category')->with('response', 'Category Added Succesfully');
    }
    
    /*public function postCount() {
        return $this->hasMany('App\Post')
            ->selectRaw('categories.category, count(*) AS aggregate')
            ->groupBy('categories.category');
            $categoriesCount = Category::with('postCount')->get(); 
            $avgPosts = $categoriesCount->sum('postCount') / $categoriesCount->count();
            return view('categories.category', ['categoriesCount' => $categoriesCount, 'avgPosts' => $avgPosts]);
    }*/
}