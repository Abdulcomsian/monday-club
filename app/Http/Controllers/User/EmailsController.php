<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    function index()
    {
        return view('user.emails.index');
    }

    function show()
    {
        return view('user.emails.show');
    }
}
