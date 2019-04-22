<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index');
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        Blog::create($request->all());
    }

    public function update(Blog $blog, Request $request)
    {
        $blog->update($request->all());
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
    }
}
