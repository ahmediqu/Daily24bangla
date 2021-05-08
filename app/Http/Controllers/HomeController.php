<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        $data = [];
        $data['posts'] = Post::with('category')->orderBy('id', 'desc')->limit(50)->get();

        $data['categories_posts'] = Category::with('posts')->limit(9)->get();


        return view('website.index', $data);
    }

    public function post($slug)
    {
        $data = [];
        $data['posts'] = Post::with('category')->orderBy('id', 'desc')->limit(10)->get();
        $data['post'] = Post::with('category')->where('slug', $slug)->first();
        return view('website.post', $data);

    }

    public function category($slug) {
        $data = [];
        $data['posts'] = Post::with('category')->orderBy('id', 'desc')->limit(10)->get();
        $category = Category::where('slug', $slug)->first();
        $data['category_posts'] = Post::with('category')->where('category_id', $category->id)->get();
        return view('website.category', $data);
    }


}
