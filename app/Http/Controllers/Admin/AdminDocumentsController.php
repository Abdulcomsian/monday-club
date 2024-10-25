<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDocumentsController extends Controller
{
    function index()
    {
        return view('admin.documents.index');
    }

    function show()
    {
        return view('admin.documents.show');
    }
}
