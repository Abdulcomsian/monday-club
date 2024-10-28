<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEmailsController extends Controller
{
    function index()
    {
        return view('admin.emails.index');
    }

    function show()
    {
        return view('admin.emails.show');
    }
}
