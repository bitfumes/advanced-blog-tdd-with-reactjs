<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        Blog::create($request->all());
    }
}
