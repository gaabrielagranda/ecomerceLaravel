<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){ //show all categories
        $categories = Category::all(); //get all categories
        return view('category.index', compact('categories')); //return view with categories
    }
    public function show($id){ //show category by id
        $category = Category::findOrFail($id); //get category by id and findOrFail is used to get the category by id and if not found, it throws an exception
        return view('category.show', compact('category')); //return view with category
    }
}
