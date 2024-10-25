<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    function index()
    {
        return view('admin.videos.index');
    }

    function create()
    {
        return view('admin.videos.create');
    }

    function show()
    {
        return view('admin.videos.show');
    }

    function edit()
    {
        return view('admin.videos.edit');
    }
}
