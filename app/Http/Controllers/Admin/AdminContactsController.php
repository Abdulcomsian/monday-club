<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContactsController extends Controller
{
    function index()
    {
        return view('admin.contacts.index');
    }

    function show()
    {
        return view('admin.contacts.show');
    }
}
