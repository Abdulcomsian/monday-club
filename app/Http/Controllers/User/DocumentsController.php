<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    function index()
    {
        return view('user.documents.index');
    }

    function create()
    {
        return view('user.documents.create');
    }

    function show()
    {
        return view('user.documents.show');
    }

    function edit()
    {
        return view('user.documents.edit');
    }
}
