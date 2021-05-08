<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = [];
        $data['categories'] = Category::latest()->get();
        return view('admin.category.lists',$data);
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
         $category = Category::create($request->all());
         Session::flash('success', 'Successfully Saved');
         return back();
    }


    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category', $category));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('success', 'Deleted');
        return back();
    }
}
