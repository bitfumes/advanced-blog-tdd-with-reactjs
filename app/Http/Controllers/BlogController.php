<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(BlogRequest $request)
    {
        Blog::create($request->all());
        return redirect(route('blog.create'))->with('message', 'Blog is saved successfully');
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
