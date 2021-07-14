<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $title = 'Ashok Gallery';

        return view('welcome', compact('categories', 'title'));
    }

    public function gallery(Category $category)
    {
        $title = 'Ashok Gallery';

        return view('show', compact('category','title'));
    }
}
