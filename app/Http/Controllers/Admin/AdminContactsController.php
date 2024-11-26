<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\ContactServices;
use App\Http\Controllers\Controller;

class AdminContactsController extends Controller
{
    protected $contactServices;
    public function __construct(ContactServices  $contactServices)
    {
        $this->contactServices = $contactServices;
    }
    function index()
    {
        $data = $this->contactServices->index();
        return view('admin.contacts.index', compact('data'));
    }

    function show($id)
    {
        $data = $this->contactServices->show($id);
        return view('admin.contacts.show', compact('data'));
    }
}
