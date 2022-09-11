<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
      $categories = [
        ['id'=>'1','name' => 'Category One', 'slug' => 'category-one','status'=>1 ],
        ['id'=>'2','name' => 'Category Two', 'slug' => 'category-two','status'=>0 ]
      ];
      return view('admin.categories.categories',['title' =>'Categories Listing','categories'=>$categories]);
    }
}
