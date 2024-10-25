<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    function index()
    {
        return view('user.contacts.index');
    }

    function create()
    {
        return view('user.contacts.create');
    }

    function show()
    {
        return view('user.contacts.show');
    }

    function edit()
    {
        return view('user.contacts.edit');
    }
}
