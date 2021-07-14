<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        if(auth()->user()->role == 'Admin')
            return redirect('/admin');
        return redirect('/');
    }

    public function index()
    {
        $categories = Category::select(['id','name'])->get();

        return view('welcome', compact('categories'));
    }

    public function gallery(Category $category)
    {
        return view('show', compact('category'));
    }
}
