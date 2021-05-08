<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = [];
        $data['posts'] = Post::with('category')->orderBy('id','desc')->get();
        return view('admin.post.lists',$data);
    }


    public function create()
    {
        $data = [];
        $data['categories'] = Category::all();
        return view('admin.post.create', $data);
    }


    public function store(Request $request)
    {

        $posts = new Post();
        $posts->title = $request->title;
        $posts->sort_description = $request->sort_description;
        $posts->description = $request->description;
        $posts->author_id = Auth::user()->id;
        $posts->category_id = $request->category_id;
        $posts->status = $request->status;

        $image = $request->file('image');

        if ($image) {
            $image_name = time() . '.' . request()->image->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'posts/image/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('image')->move($destination_path, $image_full_name);
            if ($success) {
                $posts->image = $image_url;
            }
        }

        $posts->save();
        Session::flash('success', 'Successfully Saved');
        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
